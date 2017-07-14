# Centos

## 修改语言

*6*

`/etc/sysconfig/i18n`

*7*

`/etc/locale.conf`

`LANG="zh_CN.UTF-8"` 为中文，`LANG="en_US.UTF-8"` 为英文

## 修改时区

```sh
cp -f /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
clock -w
```

## 查看内核

```sh
cat /proc/version
rpm -qa | grep kernel
uname -r
```

## 强制检查分区

在根目录下建立一个 `/forcefsck` 文件
