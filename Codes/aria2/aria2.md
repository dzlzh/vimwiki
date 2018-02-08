- [aria2](https://github.com/aria2/aria2)
- 修改 `aria2.conf` 和 `HideRun.vbs` 中的路径
- 新建 `aria2.session`
- 启动 `HideRun.vbs`
- [aria2 WebUI](http://aria2c.com/)

可把 `HideRun.vbs` 放到 `C:\Users \ 用户名 \ AppData\Roaming\Microsoft\Windows\Start Menu\Programs\Startup` 开机自动启动

## 下载文件

### 以配置文件启动

```
aria2c --conf-path=aria2.conf -D
```

### 直接添加链接下载文件：

```
aria2c http://www.url.com/file.zip
```

### 从多个地址源下载同一个文件（用空格隔开）：

```
aria2c http://www.url1.com/file.zip www.url2.com/file.zip
```

### 使用 n 个线程下载文件（"x2" 就是 2 个线程）： 

```
aria2c -x2 http://www.url.com/file.zip
```

### 从 txt 文本文档中获取下载链接下载文件：

```
aria2c -i http://www.url.com/url.txt
```

### 为所有的连接设置代理服务器

```
aria2c all-proxy='http://proxy:8080' http://url.com/file.zip
```

> -all-proxy 选项会被具体的代理选项重载： -http-proxy, -https-proxy, -ftp-proxy

只为 HTTP 设置代理服务器

```
aria2c http-proxy='http://proxy:8080' http://www.url.com/file.zip
```

设置需要验证的代理服务器

```
aria2c http-proxy='http://proxy:8080' --http-proxy-user='username' --http-proxy-passwd='password' http://www.url.com/file.zip
aria2c http-proxy='http://username:password@proxy:8080' http://www.url.com/file.zip
```
