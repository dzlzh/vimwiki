# 启动

`-d` 启动一个守护进程

`-l` 监听的服务器IP地址

`-p` 监听的端口，默认11211

`-m` 分配给Memcache使用的内存数量，单位是MB

`-u` 运行Memcache的用户

`-c` 选项是最大运行的并发连接数，默认是1024

`-P` 是设置保存Memcache的pid文件



# 系统类

## `addServer()`

向服务器池中增加一个服务器

```php
public bool Memcached::addServer ( string $host , int $port [, int $weight = 0 ] );
```

**范例**

```php
$m = new Memcached();
$m->addServer('127.0.0.1', 11211);
```

## `addServers()`

向服务器池中增加多台服务器

```php
public bool Memcached::addServers ( array $servers );
```

**范例**

```php
$m = new Memcached();
$server = array(
    array("127.0.0.1", 11211),
    array("127.0.0.1", 11211),
);
$m->addServers($server);
```

