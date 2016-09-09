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

## SCP

`scp`用于在Linux下进行远程拷贝文件的命令。

**命令格式**

`scp [参数] [原路径] [目标路径]`

**命令参数**

- `-1` 强制scp命令使用协议ssh1  
- `-2` 强制scp命令使用协议ssh2  
- `-4` 强制scp命令只使用IPv4寻址  
- `-6` 强制scp命令只使用IPv6寻址  
- `-B` 使用批处理模式（传输过程中不询问传输口令或短语）  
- `-C` 允许压缩。（将-C标志传递给ssh，从而打开压缩功能）  
- `-p` 保留原文件的修改时间，访问时间和访问权限。  
- `-q` 不显示传输进度条。  
- `-r` 递归复制整个目录。  
- `-v` 详细方式显示输出。scp和ssh(1)会显示出整个过程的调试信息。这些信息用于调试连接，验证和配置问题。   
- `-c` cipher  以cipher将数据传输进行加密，这个选项将直接传递给ssh。   
- `-F` ssh_config  指定一个替代的ssh配置文件，此参数直接传递给ssh。  
- `-i` identity_file  从指定文件中读取传输时使用的密钥文件，此参数直接传递给ssh。    
- `-l` limit  限定用户所能使用的带宽，以Kbit/s为单位。     
- `-o` ssh_option  如果习惯于使用ssh_config(5)中的参数传递方式，   
- `-P` port  注意是大写的P, port是指定数据传输用到的端口号   
- `-S` program  指定加密传输时所使用的程序。此程序必须能够理解ssh(1)的选项。

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

## 提取

```sh
tar xjf    *.tar.bz2
tar xzf    *.tar.gz
bunzip2    *.bz2
unrar e    *.rar
gunzip     *.gz
tar xf     *.tar
tar xjf    *.tbz2
tar xzf    *.tgz
unzip      *.zip
uncompress *.Z
7z x       *.7z
```



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



