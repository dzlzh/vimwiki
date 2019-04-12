# [Aria2](https://github.com/aria2/aria2)

## 直接在命令行下载

`aria2c url`
 
## 分段下载

`aria2c -s 2 url `

## 断点续传

`aria2c -c url`
 
## 下载 tor-rent 文件

`aria2c -o url.tor-rent`
 
## 后台下载

`aria2c -D url`
`aria2c –deamon=true url`
 
## 验证文件

`aria2c –checksum=md5=md5`
 
## B-T 下载

`aria2c url.torr-ent`
 
## 设置 dht 端口

`aria2c –dht-listen-port=1234 .torrent`
 
## 下载需要引用页的文件

`aria2c –referer=referurl url`
 
## 限速下载单个文件

`aria2c –max-download-limit=500k url`

## 限速下载全局

`aria2c –max-overall-download-limit=500k url`
 
## 下载需要 Cookie 验证的文件

`aria2c –essay-header=’Cookie:cookieName=cookieContent’ url`
`aria2c –load-cookies=cookieName  url`
 
## 批量下载文本中所有 URL

`aria2c -i uris.txt`

## RPC Server 模式

`aria2c --enable-rpc --rpc-listen-all --rpc-allow-origin-all -c --dir download -D`

## 配置文件启动

`aria2c --conf-path="aria2.conf"`
