# Curl

`curl [options / URLs]`

## `-X`

设置请求方式

## `-H`

添加 HTTP 请求的标头

## `-A`

指定客户端的用户代理标头，即 `User-Agent`

## `-d`

发送 `POST` 请求的数据体

## `-b`

发送 `Cookie`

## `-c`

将服务器设置的 `Cookie` 写入一个文件

## `-i`

打印出服务器回应的 HTTP 标头

## `-e`

设置 HTTP 的标头 `Referer`

## `-F`

向服务器上传二进制文件

## `-G`

构造 URL 的查询字符串

## `-I`

向服务器发出 `HEAD` 请求

## `-k`

跳过 SSL 检测

## `-L`

HTTP 请求跟随服务器的重定向

## `-o`

将服务器的回应保存成文件

## `-O`

将服务器回应保存成文件，并将 URL 的最后部分当作文件名

## `-s`

不输出错误和进度信息

## `-x`

设置代理


## 参考资料

- [阮一峰的网络日志 - curl 的用法指南](https://www.ruanyifeng.com/blog/2019/09/curl-reference.html)
