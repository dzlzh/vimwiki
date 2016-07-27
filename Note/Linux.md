# Linux命令

## 定时任务

`crontab`命令的一般形式为：

`crontab [-u user] -e -l -r`

其中

`-u` 用户名

`-e` 编辑`crontab`文件

`-l` 列出`crontab`文件中的内容

`-r` 删除`crontab`文件

## Linux Shell `echo log 1>/dev/null 2>&1`含义

命令的结果可以通过`%>`的形式来定义输出

`/dev/null` 代表空设备文件

`>` 代表重定向到哪里，例如：`echo '123' >/home/123.txt`

`1` 表示stdout标准输出，系统默认值是`1`，所以`>/dev/null`等同于`1>/dev/null`

`2` 表示stderr标准错误

`&` 表示等同于的意思，`2>&1`，表示`2`的输出重定向等同于`1`

## SSH Key

`ssh-keygen -t rsa -C "email"`

---

# Centos

## 修改语言

`/etc/sysconfig/i18n`中`LANG="zh_CN.UTF-8"`为中文，`LANG="en_US.UTF-8"`为英文

## 修改时区

```shell
cp -f /usr/share/zoneinfo/Asia/Shanghai /etc/localtime
clock -w
```

## 查看内核

```shell
cat /proc/version
rpm -qa | grep kernel
uname -r
```

## 强制检查分区

在根目录下建立一个`/forcefsck`文件



