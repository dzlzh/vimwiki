# PHP - 错误报告

## 开发环境

```
display_errors = On
display_startup_errors = On
error_reporting = -1
log_errors = On
```

**不同 PHP 版本下开启全部错误显示**

- < 5.3 `-1` 或 `E_ALL`
- 5.3 `-1` 或 `E_ALL | E_STRICT`
- \> 5.3 `-1` 或 `E_ALL`

## 生产环境

```
display_errors = Off
display_startup_errors = Off
error_reporting = E_ALL
log_errors = On
```
# PHP - 上传设置

```
upload_max_filesize = 2G;
post_max_size = 2000M;
memory_limit = 1024M;
max_execution_time = 120;
```

# php.ini

```
# 关闭全局注册变量
register_globals = Off

# 不要自动修正文件路径
cgi.fix_pathinfo = 0

# 为On时,则表示允许,也就是说,此时可以通过file_get_contents(),include(),require()等函数直接从远端获取数据
# 容易造成任意文件读取和包含问题,注意,此项默认就是开启的
allow_url_fopen = Off

# 容易造成远程包含,强烈建议关闭此项		
allow_url_include = Off

# 禁用各种高危函数
disable_functions = dl,eval,assert,popen,proc_close,gzinflate,str_rot13,base64_decode,exec,system,ini_alter,readlink,symlink,leak,proc_open,pope,passthru,chroot,scandir,chgrp,chown,escapeshellcmd,escapeshellarg,shell_exec,proc_get_status,max_execution_time,opendir,readdir,chdir,dir,unlink,delete,copy,rename,ini_set

# 关闭转义
magic_quotes_gpc = Off
magic_quotes_runtime = Off

# 关闭各种错误回显
display_errors = Off
error_reporting = E_WARING & ERROR
log_errors = On
error_log = /usr/local/php/logs/php_errors.log
log_errors_max_len = 2048
ignore_repeated_errors = Off
display_startup_errors = Off

# 隐藏详细版本号
expose_php = Off

# 限制 php 对本地文件系统的访问
open_basedir = "/usr/local/html/"

# 限制 php 单脚本执行时长
max_execution_time = 30
max_input_time = 60
memory_limit = 8M

# 上传 
file_uploads = On
upload_tmp_dir = "/tmp/"
upload_max_filesize = 8M
post_max_size = 8M
```
