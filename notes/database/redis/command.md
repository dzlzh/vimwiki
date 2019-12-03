# Redis 命令

## [`KEYS`](http://redisdoc.com/key/keys.html)

```
KEYS pattern
```

查找所有符合给定模式 `pattern` 的 `key`

> 支持正则表达模式

## [`Setrange`](http://www.redis.net.cn/order/3553.html)

```
SETRANGE KEY_NAME OFFSET VALUE
```

指定的字符串覆盖给定 key 所储存的字符串值，覆盖的位置从偏移量 offset 开始
