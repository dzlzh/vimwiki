# 命令

## 定时任务

```
/ect/crontab
/etc/init.d/cron restart
service cron restart
```

- `crontab` 命令的一般形式为：
- `crontab [-u user] -e -l -r`
  - `-u` 用户名
  - `-e` 编辑 `crontab` 文件
  - `-l` 列出 `crontab` 文件中的内容
  - `-r` 删除 `crontab` 文件

## 执行多个命令

- `;` 每个命令之间用 `;` 隔开，各命令的执行结果，不会影响其它命令的执行。
- `&&` 每个命令之间用 `&&` 隔开，若前面的命令执行成功，才会去执行后面的命令。
- `||` 每个命令之间用 `||` 隔开，`||` 是或的意思，只有前面的命令执行失败后才去执行下一条命令，直到执行成功一条命令为止。

## Linux Shell echo log 1>/dev/null 2>&1 含义

命令的结果可以通过 `%>` 的形式来定义输出

- `/dev/null` 代表空设备文件
- `>` 代表重定向到哪里，例如：`echo '123' >/home/123.txt`
- `1` 表示 stdout 标准输出，系统默认值是 `1`，所以 `>/dev/null` 等同于 `1>/dev/null`
- `2` 表示 stderr 标准错误
- `&` 表示等同于的意思，`2>&1`，表示 `2` 的输出重定向等同于 `1`

## 命令后台运行

- `&` 将指令丢到后台去执行，关掉终端会停止运行
- `[ctrl]+Z` 将前台任务等到后台中暂停
- `jobs -l` 查看后台的工作状态
- `fg %jobnumber` 将后台的任务拿到前台来处理
- `bg %jobnumber` 将后台任务入到后台中去处理
- `kill` 管理后台的任务
- `nohup` 后台运行，关掉终端也会继续运行

## SSH Key

`ssh-keygen -t rsa -C "email"`

## SCP

`scp` 用于在 Linux 下进行远程拷贝文件的命令。

**命令格式**

`scp 『参数』 『原路径』 『目标路径』`

**命令参数**

- `-1` 强制 `scp` 命令使用协议 ssh1  
- `-2` 强制 `scp` 命令使用协议 ssh2  
- `-4` 强制 `scp` 命令只使用 IPv4 寻址  
- `-6` 强制 `scp` 命令只使用 IPv6 寻址  
- `-B` 使用批处理模式（传输过程中不询问传输口令或短语）  
- `-C` 允许压缩。（将 -C 标志传递给 ssh，从而打开压缩功能）  
- `-p` 保留原文件的修改时间，访问时间和访问权限。  
- `-q` 不显示传输进度条。  
- `-r` 递归复制整个目录。  
- `-v` 详细方式显示输出。scp 和 ssh(1) 会显示出整个过程的调试信息。这些信息用于调试连接，验证和配置问题。   
- `-c` cipher 以 cipher 将数据传输进行加密，这个选项将直接传递给 ssh。   
- `-F` ssh_config 指定一个替代的 ssh 配置文件，此参数直接传递给 ssh。  
- `-i` identity_file 从指定文件中读取传输时使用的密钥文件，此参数直接传递给 ssh。    
- `-l` limit 限定用户所能使用的带宽，以 Kbit/s 为单位。     
- `-o` ssh_option 如果习惯于使用 ssh_config(5) 中的参数传递方式，   
- `-P` port 注意是大写的 P， port 是指定数据传输用到的端口号   
- `-S` program 指定加密传输时所使用的程序。此程序必须能够理解 ssh(1) 的选项。

**例子**

```sh
#获取远程服务器上的文件
scp root@localhost:/root/test.txt ~/test.txt
#获取远程服务器上的目录
scp -r root@localhost:/root/test ~/test
#将本地文件上传到服务器上
scp ~/test.txt root@localhost:/root/test.txt
#将本地目录上传到服务器上
scp ~/test root@localhost:/root/test
```

## rsync

`rsync` 一个远程数据同步工具

**命令格式**

```
# 拷贝本地文件
rsync [OPTION]... SRC DEST
# 将本地机器的内容拷贝到远程机器
rsync [OPTION]... SRC [USER@]host:DEST
# 将远程机器的内容拷贝到本地机器
rsync [OPTION]... [USER@]HOST:SRC DEST
# 从远程 rsync 服务器中拷贝文件到本地机
rsync [OPTION]... [USER@]HOST::SRC DEST
# 从本地机器拷贝文件到远程 rsync 服务器中
rsync [OPTION]... SRC [USER@]HOST::DEST
# 列远程机的文件列表
rsync [OPTION]... rsync://[USER@]HOST[:PORT]/SRC [DEST]
```

**命令参数**

- `-a` 采取递归方式来同步，且尽可能的保持各个方面的一致性。
- `-t` 将源文件的 “modify time” 同步到目标机器。 
- `-z` 压缩
- `-r` 递归文件夹
- `-p` 保持权限
- `-g` 保持文件的属组
- `-o` 保持文件的属主
- `-D` 是保持设备文件的原始信息

## 提取

```sh
tar -xjf    *.tar.bz2
tar -xzf    *.tar.gz
tar -xf     *.tar
tar -xjf    *.tbz2
tar -xzf    *.tgz
tar -xvJf   *.tar.xz
7z -x       *.7z
unrar -e    *.rar
unzip       *.zip
gunzip      *.gz
bunzip2     *.bz2
uncompress  *.Z
```

## source

`source` 命令也称为 “点命令”，也就是一个点符号（.）。`source` 命令通常用于重新执行刚修改的初始化文件，使之立即生效，而不必注销并重新登录。

```sh
source filename
. filename
```

## ls 显示时间

```sh
ls -lc #最后更改时间
ls -u  #最后存取时间
ls -l  #最后修改时间
ls --time-style '+%Y/%m/%d %H:%M:%S'  #时间格式
```

## 创建多级目录

```sh
mkdir -p /tmp/tmp1/tmp2
```

## 生成指定大小的文件

```sh
# 生成一个 5G 文件
dd if=/dev/zero of=tmp.5G bs=1G count=5
# if=FILE : 指定输入文件，若不指定则从标注输入读取。这里指定为 /dev/zero 是 Linux 的一个伪文件，它可以产生连续不断的 null 流（二进制的 0）
# of=FILE : 指定输出文件，若不指定则输出到标准输出
# bs=BYTES : 每次读写的字节数，可以使用单位 K、M、G 等等。另外输入输出可以分别用 ibs、obs 指定，若使用 bs，则表示是 ibs 和 obs 都是用该参数
# count=BLOCKS : 读取的 block 数，block 的大小由 ibs 指定（只针对输入参数）
```

## SSH

`ssh -o ServerAliveInterval=60 user@host`

## tail

命令从指定点开始将文件写到标准输出

```sh
tail[必要参数][选择参数]『文件』
```

**参数**

- `-f` 循环读取
- `-q` 不显示处理信息
- `-v` 显示详细的处理信息
- `-c` 《数目》 显示的字节数
- `-n` 《行数》 显示行数
- `--pid=PID` 与 `-f` 合用，表示在进程 ID,PID 死掉之后结束。
- `-q`, `--quiet`, `--silent` 从不输出给出文件名的首部
- `-s`, `--sleep-interval=S` 与 `-f` 合用，表示在每次反复的间隔休眠 S 秒

## chmod

改变文件或目录的访问权限

```sh
chmod [-cfvR] [--help] [--version] mode file
```

**参数**

- `-c` 当发生改变时，报告处理信息
- `-f` 错误信息不输出
- `-R` 处理指定目录以及其子目录下的所有文件
- `-v` 运行时显示详细处理信息
- `--reference=《目录或者文件》` 设置成具有指定目录或者文件具有相同的权限
- `--version` 显示版本信息
- `《权限范围》+《权限设置》` 使权限范围内的目录或者文件具有指定的权限
- `《权限范围》-《权限设置》` 删除权限范围的目录或者文件的指定权限
- `《权限范围》=《权限设置》` 设置权限范围内的目录或者文件的权限为指定的值

**权限范围**

- `u` 目录或者文件的当前的用户
- `g` 目录或者文件的当前的群组
- `o` 除了目录或者文件的当前用户或群组之外的用户或者群组
- `a` 所有的用户及群组

**权限代号**

- `r` 读权限，用数字 4 表示
- `w` 写权限，用数字 2 表示
- `x` 执行权限，用数字 1 表示
- `-` 删除权限，用数字 0 表示
- `s` 特殊权限

## chown

改变文件的拥有者和群组

```sh
chown 『选项』 [所有者][:『组]] 文件
```

**参数**

- `-c` 显示更改的部分的信息
- `-f` 忽略错误信息
- `-h` 修复符号链接
- `-R` 处理指定目录以及其子目录下的所有文件
- `-v `显示详细的处理信息
- `-deference `作用于符号链接的指向，而不是链接文件本身
- `--reference=《目录或文件》 `把指定的目录 / 文件作为参考，把操作的文件 / 目录设置成参考文件 / 目录相同拥有者和群组
- `--from=《当前用户：当前群组》 `只有当前用户和群组跟指定的用户和群组相同时才进行改变
- `--help `显示帮助信息
- `--version `显示版本信息

## test

检查某个条件是否成立

```sh
test 『选项』 『文件|数值|字符串』
```

**参数**

- 文件
  - `-e` 如果文件存在则为真
  - `-r` 如果文件存在且可读则为真
  - `-w` 如果文件存在且可写则为真
  - `-x` 如果文件存在且可执行则为真
  - `-s` 如果文件存在且至少有一个字符则为真
  - `-d` 如果文件存在且为目录则为真
  - `-f` 如果文件存在且为普通文件则为真
  - `-c` 如果文件存在且为字符型特殊文件则为真
  - `-b` 如果文件存在且为块特殊文件则为真
- 数值
  - `-eq` 等于则为真
  - `-ne` 不等于则为真
  - `-gt` 大于则为真
  - `-ge` 大于等于则为真
  - `-lt` 小于则为真
  - `-le` 小于等于则为真
- 字符串
  - `=`  等于则为真
  - `!=` 不相等则为真
  - `-z` 字符串的长度为零则为真
  - `-n` 字符串的长度不为零则为真

## expect

处理交互命令

- `send` 向进程发送字符串
- `expect` 从进程接收字符串
- `spawn` 启动新的进程
- `interact` 允许用户交互

## find

```
find 《指定目录》 《指定条件》 《指定动作》
```

## 文件夹挂载

```
# 手动挂载
mount [-t vfstype] [-o options] device dir
# 取消挂载
umount -f dir
```

- 光盘或光盘镜像：`iso9660`
- DOS fat16 文件系统：`msdos`
- Windows 9x fat32 文件系统：`vfat `
- Windows NT ntfs 文件系统：`ntfs`
- Mount Windows 文件网络共享：`smbfs`
- UNIX(LINUX) 文件网络共享：`nfs`

## 用户

### 创建用户

#### adduser

会自动为创建的用户指定主目录、系统 shell 版本，会在创建时输入用户密码

```
adduser username
```

#### useradd

需要使用参数选项指定上述基本设置，如果不使用任何参数，则创建的用户无密码、无主目录、没有指定 shell 版本

```
useradd [option] username
```

**[option]**

- `-d 《登入目录》` 指定用户登入时的目录。
- `-g 《群组》`     初始群组。
- `-G 《群组》`     非初始群组。
- `-m`            自动创建用户的家目录。
- `-M`            不要创建用户的家目录。
- `-N`            不要创建以用户名称为名的群组。
- `-s`            指定用户登入后所使用的 shell。

### 删除用户

#### userdel

```
# 只删除用户名
userdel username
# 连同用户主目录一块删除
userdel -r username
```

## 时间

```
# 时间戳转时间
date -d @时间戳

# 时间转时间戳
date -d '时间' +%s
```

## 显示登入系统的用户信息

### [`w`](http://www.runoob.com/linux/linux-comm-w.html)

可得知目前登入系统的用户有哪些人，以及他们正在执行的程序。

```
w [-fhlsuV][用户名称]
```

- `-f`　开启或关闭显示用户从何处登入系统
- `-h`　不显示各栏位的标题信息列
- `-l`　使用详细格式列表，此为预设值
- `-s`　使用简洁格式列表，不显示用户登入时间，终端机阶段作业和程序所耗费的 CPU 时间
- `-u`　忽略执行程序的名称，以及该程序耗费 CPU 时间的信息
- `-V`　显示版本信息

### [`last`](http://www.runoob.com/linux/linux-comm-last.html)

显示系统开机以来获是从每月初登入者的讯息

```
last [options]
```

- `-R` 省略 hostname 的栏位
- `-num` 展示前 num 个
- `username` 展示 username 的登入讯息
- `tty` 限制登入讯息包含终端机代号

> **Tips**：`ssh -T user@ip /usr/bin/bash -i` 可隐匿于 `w` 和 `last`

## 命令行通配符

1. 通配符是先解释，再执行
2. 通配符不匹配，会原样输出
3. 只适用于单层路径
4. 可用于文件名

### `?`

`?` 字符代表单个字符

### `*`

`*` 代表任意数量的字符

### `[...]`

`[...]` 匹配方括号之中的任意一个字符

`[start-end]` 表示一个连续的范围

### `[^...]` 和 `[!...]`

`[^...]` 和 `[!...]` 表示匹配不在方括号里面的字符（不包括空字符）

`[!start-end]` 连续范围的写法

### `{...}`

`{...}` 表示匹配大括号里面的所有模式，模式之间使用逗号分隔

`{start..end}` 会匹配连续范围的字符

## kill

删除执行中的程序或工作

```
kill [options] pid
```

- `-a` 当处理当前进程时，不限制命令名和进程号的对应关系
- `-l 《信息编号》` 若不加《信息编号》选项，则 `-l` 参数会列出全部的信息名称
- `-p` 指定 kill 命令只打印相关进程的进程号，而不发送任何信号
- `-s 《信息名称或编号》` 指定要送出的信息
- `-u` 指定用户

## dos2unix/unix2dos

`windows` 与 `linux` 格式互换

```sh
dos2unix [-hkqV] [-c convmode] [-o file ...] [-n infile outfile ...]
```

`-k` 保持输出文件的日期不变
`-q` 安静模式，不提示任何警告信息
`-V` 查看版本
`-c` 转换模式，模式有：`ASCII`, `7bit`, `ISO`, `Mac`, 默认是：`ASCII`
`-o` 写入到源文件
`-n` 写入到新文件

## 隐藏属性

```sh
lsattr 查看隐藏属性
chattr 修改隐藏属性
```
