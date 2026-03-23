# Linux 2GB 内存环境优化手册

## 🛠️ 第一部分：配置文件修改清单

以下是需要手动编辑或检查的三个核心文件：

### 1. `/etc/fstab` (磁盘 Swap 挂载)

**作用：** 确保 4GB 的交换文件在开机时自动启用。

```text
# 确保文件末尾有这一行
/swapfile    swap    swap    defaults    0    0
```

### 2. `/etc/default/zramswap` (ZRAM 工具配置)

**作用：** 定义内存压缩比例和算法，提升小内存下的响应速度。

```bash
# 压缩算法：zstd 压缩率最高，适合 2G 内存
ALGO=zstd

# 占比：使用物理内存的 60% 作为压缩池（约 1.2G）
PERCENT=60

# 优先级：必须高于磁盘 Swap (100 > -2)
PRIORITY=100
```

### 3. `/etc/sysctl.conf` (内核参数优化)

**作用：** 调整系统对虚拟内存的使用倾向。

```text
# 积极使用 ZRAM，腾出物理内存给活跃程序
vm.swappiness=100

# 降低缓存回收压力，提升文件读取响应
vm.vfs_cache_pressure=50
```

---

## 🚀 第二部分：全套操作命令流

如果你是从零开始，按顺序执行以下命令即可：

### 1. 磁盘 Swap (4GB) 初始化

```bash
sudo swapoff /swapfile                     # 关闭旧 Swap
sudo fallocate -l 4G /swapfile              # 扩容至 4G
sudo chmod 600 /swapfile                    # 安全权限
sudo mkswap /swapfile                       # 格式化签名
sudo swapon /swapfile                       # 立即启用
```

### 2. ZRAM 开启与配置

```bash
sudo apt update && sudo apt install zram-tools -y  # 安装工具
# [此处请按上方清单修改 /etc/default/zramswap]
sudo systemctl restart zramswap                    # 重启服务应用配置
```

### 3. 内核参数生效

```bash
# [此处请按上方清单修改 /etc/sysctl.conf]
sudo sysctl -p                                     # 立即应用配置
```

---

## 📊 第三部分：架构逻辑与监控

优化后，你的系统将采用 **RAM -> ZRAM -> Disk Swap** 的三层结构：

### 验证状态的常用命令

* **查看整体内存：** `free -h`
* **查看层级与优先级：** `swapon --show`
    * *你应该看到 `zram0` 的优先级为 100，`swapfile` 为 -2。*
* **查看实时压缩率：** `zramctl`
    * *关注 `RATIO`，通常 3:1 的比例意味着你用 1G 内存存了 3G 的数据。*

---

### 💡 核心逻辑总结

这套方案的核心在于：**用少量的 CPU 算力（压缩）来换取更多的可用内存**。对于 2GB 的机器，这能极大缓解编译代码或运行后端服务时的卡顿问题。

```bash
#!/bin/bash

# 检查是否为 root 用户
if [ "$EUID" -ne 0 ]; then
  echo "请使用 sudo 运行此脚本"
  exit
fi

echo "🚀 开始优化 2GB 内存环境..."

# --- 1. 创建/更新 4GB 磁盘 Swap ---
echo "--- 正在配置 4GB 磁盘 Swap ---"
if [ -f /swapfile ]; then
    swapoff /swapfile 2>/dev/null
fi
fallocate -l 4G /swapfile || dd if=/dev/zero of=/swapfile bs=1M count=4096
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile

# 写入 fstab (如果不包含)
if ! grep -q "/swapfile" /etc/fstab; then
    echo '/swapfile swap swap defaults 0 0' >> /etc/fstab
fi

# --- 2. 安装并配置 ZRAM ---
echo "--- 正在配置 ZRAM (1.1GB 压缩内存) ---"
apt update && apt install zram-tools -y

# 写入 ZRAM 配置
cat <<EOF > /etc/default/zramswap
ALGO=zstd
PERCENT=60
PRIORITY=100
EOF

systemctl restart zramswap

# --- 3. 优化内核参数 (Sysctl) ---
echo "--- 正在优化内核参数 (Swappiness=100) ---"
# 先清除旧的重复配置
sed -i '/vm.swappiness/d' /etc/sysctl.conf
sed -i '/vm.vfs_cache_pressure/d' /etc/sysctl.conf

# 写入新配置
cat <<EOF >> /etc/sysctl.conf
vm.swappiness=100
vm.vfs_cache_pressure=50
EOF

sysctl -p

# --- 4. 结果验证 ---
echo -e "\n✅ 优化完成！当前内存状态："
swapon --show
free -h

echo -e "\n💡 提示：zram0 优先级应为 100，swapfile 优先级应为 -2。"
```
