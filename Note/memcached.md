# 启动

`-d` 启动一个守护进程

`-l` 监听的服务器IP地址

`-p` 监听的端口，默认11211

`-m` 分配给Memcache使用的内存数量，单位是MB

`-u` 运行Memcache的用户

`-c` 选项是最大运行的并发连接数，默认是1024

`-P` 是设置保存Memcache的pid文件



# Memcached类

## 系统

### `addServer()`

向服务器池中增加一个服务器

```php
public bool Memcached::addServer ( string $host , int $port [, int $weight = 0 ] );
```

### `addServers()`

向服务器池中增加多台服务器

```php
public bool Memcached::addServers ( array $servers );
```

### `getStats()`

获取服务器池的统计信息

```php
public array Memcached::getStats ( void );
```

 ### `getVersion`

获取服务器池中所有服务器的版本信息

```php
public array Memcached::getVersion ( void );
```

## 数据

### `add()`

向一个新的key下面增加一个元素

```php
public bool Memcached::add ( string $key , mixed $value [, int $expiration ] );
```

`key`

> 用于存储值的键名

`value`

> 存储的值

`expiration`

> 到期时间，默认为 0（永久生效）

**返回值**

成功时返回 **TRUE**， 或者在失败时返回 **FALSE**。 如果key已经存在，`Memcached::getResultCode()`方法将会返回**`Memcached::RES_NOTSTORED`**。

### `get()`

检索一个元素

```php
public mixed Memcached::get ( string $key [, callback $cache_cb [, float &$cas_token ]] );
```

`key`

> 要检索的元素的key

`cache_cb`

> 通读缓存回掉函数或**NULL**

`cas_token`

> 检索的元素的CAS标记值

**返回值**

返回存储在服务端的元素的值或者在其他情况下返回**FALSE**。 如果key不存在，`Memcached::getResultCode()`方法将会返回**`Memcached::RES_NOTFOUND`**。

### `replace()`

替换已存在key下的元素

```php
public bool Memcached::replace ( string $key , mixed $value [, int $expiration ] );
```

### `set()`

存储一个元素

```php
public bool Memcached::set ( string $key , mixed $value [, int $expiration ] );
```

> 数据不存在会新建，如果存在会覆盖。

### `delete()`

删除一个元素

```php
public bool Memcached::delete ( string $key [, int $time = 0 ] );
```

### `flush()`

作废缓存中的所有元素

```php
public bool Memcached::flush ([ int $delay = 0 ] );
```

### `increment()`

增加数值元素的值

```php
public int Memcached::increment ( string $key [, int $offset = 1 ] );
```

`key`

> 要增加值的元素的key。

`offset`

> 要将元素的值增加的大小。

### `decrement()`

减小数值元素的值

```php
public int Memcached::decrement ( string $key [, int $offset = 1 ] );
```

### `setMulti()`

存储多个元素

```php
public bool Memcached::setMulti ( array $items [, int $expiration ] );
```

### `getMulti()`

检索多个元素

```php
public mixed Memcached::getMulti ( array $keys [, array &$cas_tokens [, int $flags ]] );
```

## 范例

```php
$m = new Memcached();
$m->addServer('127.0.0.1', 11211);
$server = array(
    array("127.0.0.1", 11211),
    array("127.0.0.1", 11211),
);
$m->addServers($server);
print_r($m->getStats());
print_r($m->getVersion());

$m->add('key', 'value', 600);
print_r($m->get('key'));//value
$m->replace('key', 'newValue', 60);
print_r($m->get('key'));//newValue
$m->set('newKey', 'value', 60);
print_r($m->get('newKey'));//value
$m->set('newKey', 'newValue', 60);
print_r($m->get('newKey'));//newValue
$m->delete('key');
$m->flush();

$m->set('num', 5, 0);
print_r($m->get('num'));//5
$m->increment('num', 5);//10
$m->decrement('num', 5);//5

$testArr = array(
    'key0' => 'value0',
    'key1' => 'value1',
);
$m->setMulti($testArr, 0);
print_r($m->getMulti(array('key0', 'key1')));
/*
Array
(
    [key0] => value0
    [key1] => value1
)
*/
```