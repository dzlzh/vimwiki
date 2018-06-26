# Nginx Config

## 整体结构

- Nginx.conf
  - 全局块
  - events 块
  - http 块
    - http 全局块
    - server 块
      - server 全局块
      - location 块

## 全局块

主要影响 Nginx 全局

- 配置运行 Nginx 服务器用户（组）
- worker process 数
- Nginx 进程 PID 存放路径
- 错误日志的存放路径
- 配置文件的引入

## events 块

主要影响 Nginx 服务器与用户的网络连接

- 设置网络连接的序列化
- 是否允许同时接收多个网络连接
- 事件驱动模型的选择
- 最大连接数的配置

## http 块

- 定义 MIMI-Type
- 自定义服务日志
- 允许 sendfile 方式传输文件
- 连接超时时间
- 单连接请求数上限

## server 块

- 配置网络监听
- 基于名称的虚拟主机配置
- 基于 IP 的虚拟主机配置

## location 块

- location 配置
- 请求根目录配置
- 更改 location 的 URI
- 网站默认首页配置 


## 指令 

### 配置运行 Nginx 服务器用户（组）

指令格式：`user user [group];`

- `user`：指定可以运行 Nginx 服务器的用户
- `group`：可选项，可以运行 Nginx 服务器的用户组

> 如果 user 指令不配置或者配置为 `user nobody nobody` ，则默认所有用户都可以启动 Nginx 进程

### worker process 数配置

Nginx 服务器实现并发处理服务的关键

指令格式：`worker_processes number | auto;`

- `number`：Nginx 进程最多可以产生的 worker process 数
- `auto`：Nginx 进程将自动检测

### Nginx 进程 PID 存放路径

Nginx 进程是作为系统守护进程在运行，需要在某文件中保存当前运行程序的主进程号，Nginx 支持该保存文件路径的自定义

指令格式：`pid file;`

- file：指定存放路径和文件名称

> 如果不指定默认置于路径 logs/nginx.pid

### 错误日志的存放路径

指定格式：`error_log file | stderr;`

- `file`：日志输出到某个文件 file
- `stderr`：日志输出到标准错误输出

### 配置文件的引入

指令格式：`include file;`

该指令主要用于将其他的 Nginx 配置或者第三方模块的配置引用到当前的主配置文件中

### 设置网络连接的序列化

指令格式：`accept_mutex on | off;`

该指令默认为 on 状态，表示会对多个 Nginx 进程接收连接进行序列化，防止多个进程对连接的争抢。

### 是否允许同时接收多个网络连接

指令格式：`multi_accept on | off;`

该指令默认为 off 状态，意指每个 worker process 一次只能接收一个新到达的网络连接。若想让每个 Nginx 的 worker process 都有能力同时接收多个网络连接，则需要开启此配置

### 事件驱动模型的选择

指令格式：`use model;`

model 模型可选择项包括：`select`、`poll`、`kqueue`、`epoll`、`rtsig` 等......

### 最大连接数的配置

指令格式：`worker_connections number;`

number 默认值为 512，表示允许每一个 worker process 可以同时开启的最大连接数

### 定义 MIME-Type

指令格式：
```
include mime.types;
default_type mime-type;
```
MIME-Type 指的是网络资源的媒体类型，也即前端请求的资源类型


### 自定义服务日志

指令格式：`access_log path [format];`

- `path`：自定义服务日志的路径 + 名称
- `format`：可选项，自定义服务日志的字符串格式。其也可以使用 log_format 定义的格式

### 允许 sendfile 方式传输文件

指令格式：

```
sendfile on | off;
sendfile_max_chunk size;
```

前者用于开启或关闭使用 sendfile() 传输文件，默认 off

后者指令若 size>0，则 Nginx 进程的每个 worker process 每次调用 sendfile() 传输的数据了最大不能超出此值；若 size=0 则表示不限制。默认值为 0

### 连接超时时间配置

指令格式：`keepalive_timeout timeout [header_timeout];`

- `timeout` 表示 server 端对连接的保持时间，默认 75 秒
- `header_timeout` 为可选项，表示在应答报文头部的 Keep-Alive 域设置超时时间：“Keep-Alive : timeout = header_timeout”

### 单连接请求数上限

指令格式：`keepalive_requests number;`

该指令用于限制用户通过某一个连接向 Nginx 服务器发起请求的次数


### 配置网络监听

指令格式：

```
# 监听的 IP 地址
listen IP[:PORT];

# 监听的端口
listen PORT;
```

### 基于名称和 IP 的虚拟主机配置

指令格式：`server_name name;`

- `name` 可以有多个并列名称，而且此处的 name 支持正则表达式书写

指令格式：`server_name IP;`

### location 配置

指令格式为：`location [ = | ~ | ~* | ^~ ] uri {...}`

- `=`：用于标准 uri 前，要求请求字符串与 uri 严格匹配，一旦匹配成功则停止
- `~`：用于正则 uri 前，并且区分大小写
- `~*`：用于正则 uri 前，但不区分大小写
- `^~`：用于标准 uri 前，要求 Nginx 找到标识 uri 和请求字符串匹配度最高的 location 后，立即使用此 location 处理请求，而不再使用 location 块中的正则 uri 和请求字符串做匹配

### 请求根目录配置

指令格式：`root path;`

- `path`：Nginx 接收到请求以后查找资源的根目录路径
 
通过 alias 指令来更改 location 接收到的 URI 请求路径

指令为： `alias path;`  

- path 为修改后的根路径 

### 设置网站的默认首页

指令格式：`index file;`

- `file` 可以包含多个用空格隔开的文件名，首先找到哪个页面，就使用哪个页面响应请
