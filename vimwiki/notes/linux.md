# Linux

## 定时任务

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

*命令格式*

`scp [参数] [原路径] [目标路径]`

*命令参数*

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

*例子*

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
tar xvJf   *.tar.xz 
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
* 生成一个 5G 文件
dd if=/dev/zero of=tmp.5G bs=1G count=5
* if=FILE : 指定输入文件，若不指定则从标注输入读取。这里指定为 /dev/zero 是 Linux 的一个伪文件，它可以产生连续不断的 null 流（二进制的 0）
* of=FILE : 指定输出文件，若不指定则输出到标准输出
* bs=BYTES : 每次读写的字节数，可以使用单位 K、M、G 等等。另外输入输出可以分别用 ibs、obs 指定，若使用 bs，则表示是 ibs 和 obs 都是用该参数
* count=BLOCKS : 读取的 block 数，block 的大小由 ibs 指定（只针对输入参数）
```

## .bashrc 提示符

```
提示符(PROMPTING)
    在 交互执行时， bash 在准备好读入一条命令时显示主提示符 PS1，在需要更多的输入来完成一条命令时显示 PS2。 Bash 允许通过插入一些反斜杠转义的特
    殊字符来定制这些提示字符串，这些字符被如下解释：
        \a     一个 ASCII 响铃字符 (07)
        \d     日期，格式是 "星期 月份 日" (例如，"Tue May 26")
        \D{format}
               format 被传递给 strftime(3)，结果被插入到提示字符串中；空的 format 将使用语言环境特定的时间格式。花括号是必需的
        \e     一个 ASCII 转义字符 (033)
        \h     主机名，第一个 ‘.’ 之前的部分
        \H     主机名
        \j     shell 当前管理的作业数量
        \l     shell 的终端设备名的基本部分
        \n     新行符
        \r     回车
        \s     shell 的名称， $0 的基本部分 (最后一个斜杠后面的部分)
        \t     当前时间，采用 24小时制的 HH:MM:SS 格式
        \T     当前时间，采用 12小时制的 HH:MM:SS 格式
        \@     当前时间，采用 12小时制上午/下午 (am/pm) 格式
        \A     当前时间，采用 24小时制上午/下午格式
        \u     当前用户的用户名 the username of the current user
        \v     bash 的版本 (例如，2.00)
        \V     bash 的发行编号，版本号加补丁级别 (例如，2.00.0)
        \w     当前工作目录
        \W     当前工作目录的基本部分
        \!     此命令的历史编号
        \*     此命令的命令编号
        \$     如果有效 UID 是 0，就是 #， 其他情况下是 $
        \nnn   对应八进制数 nnn 的字符
        \\     一个反斜杠
        \[     一个不可打印字符序列的开始，可以用于在提示符中嵌入终端控制序列
        \]     一个不可打印字符序列的结束

    命令编号和历史编号通常是不同的：历史编号是命令在历史列表中的位置，可能包含从历史文件中恢复的命令 (参见下面的 HISTORY 历史章节)，而命令编 号
    是 当 前 shell 会话中执行的命令序列中，命令的位置。字符串被解码之后，它将进行扩展，要经过 parameter expansion， command substitution， arith‐
    metic expansion 和 quote removal， 最后要经过 shell 选项 promptvars 处理 (参见下面的 shell 内建命令(SHELL BUILTIN COMMANDS) 章节中，对 命 令
    shopt 的描述)。
```

| 前景 | 背景 | 颜色   |
|------|------|--------|
| 30   | 40   | 黑色   |
| 31   | 41   | 紅色   |
| 32   | 42   | 綠色   |
| 33   | 43   | 黃色   |
| 34   | 44   | 藍色   |
| 35   | 45   | 紫紅色 |
| 36   | 46   | 青藍色 |
| 37   | 47   | 白色   |

| 代码 | 意义      |
|------|-----------|
| 0    | OFF       |
| 1    | 高亮显示  |
| 4    | underline |
| 5    | 闪烁      |
| 7    | 反白显示  |
| 8    | 不可见    |

## SSH

`ssh -o ServerAliveInterval=60 user@host`

----

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
