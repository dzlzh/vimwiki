# PHP - 加密函数

## `md5()`

计算字符串的 MD5 散列值

```php
string md5 ( string $str [, bool $raw_output = false ] );
```

## `crypt()`

单向字符串散列

```php
string crypt ( string $str [, string $salt ] );
```

- **`CRYPT_STD_DES`** - 基于标准 DES 算法的散列使用 "./0-9A-Za-z" 字符中的两个字符作为盐值。在盐值中使用非法的字符将导致 crypt() 失败。
- **`CRYPT_EXT_DES`** \- 扩展的基于 DES 算法的散列。其盐值为 9 个字符的字符串，由 1 个下划线后面跟着 4 字节循环次数和 4 字节盐值组成。它们被编码成可打印字符，每个字符 6 位，有效位最少的优先。0 到 63 被编码为 "./0-9A-Za-z"。在盐值中使用非法的字符将导致 crypt() 失败。
- **`CRYPT_MD5`** - MD5 散列使用一个以 $1$ 开始的 12 字符的字符串盐值。
- **`CRYPT_BLOWFISH`** - Blowfish 算法使用如下盐值：“`$2a$`”，一个两位 cost 参数，“`$`” 以及 64 位由 “./0-9A-Za-z” 中的字符组合而成的字符串。在盐值中使用此范围之外的字符将导致 `crypt()` 返回一个空字符串。两位 cost 参数是循环次数以 2 为底的对数，它的范围是 04-31，超出这个范围将导致 `crypt()` 失败。 PHP 5.3.7 之前只支持 “`$2a$`” 作为盐值的前缀，PHP 5.3.7 开始引入了新的前缀来修正一个在Blowfish实现上的安全风险。
- **`CRYPT_SHA256`** - SHA-256 算法使用一个以 `$5$` 开头的 16 字符字符串盐值进行散列。如果盐值字符串以 `rounds=<N>$` 开头，N 的数字值将被用来指定散列循环的执行次数，这点很像 Blowfish 算法的 cost 参数。默认的循环次数是 5000，最小是 1000，最大是 999,999,999。超出这个范围的 N 将会被转换为最接近的值。
- **`CRYPT_SHA512`** - SHA-512 算法使用一个以 `$6$ `开头的 16 字符字符串盐值进行散列。如果盐值字符串以 `rounds=<N>$` 开头，N 的数字值将被用来指定散列循环的执行次数，这点很像 Blowfish 算法的 cost 参数。默认的循环次数是 5000，最小是 1000，最大是 999,999,999。超出这个范围的 N 将会被转换为最接近的值。

## `password_hash()`

创建密码的哈希

```php
string password_hash ( string $password , integer $algo [, array $options ] );
```

* **`PASSWORD_DEFAULT`** - 使用 bcrypt 算法 (PHP 5.5.0 默认)。 注意，该常量会随着 PHP 加入更新更高强度的算法而改变。 所以，使用此常量生成结果的长度将在未来有变化。 因此，数据库里储存结果的列可超过60个字符（最好是255个字符）。
* **`PASSWORD_BCRYPT`** - 使用 **`CRYPT_BLOWFISH`** 算法创建哈希。 这会产生兼容使用 "`$2y$`" 的 `crypt()`。 结果将会是 60 个字符的字符串， 或者在失败时返回 **`FALSE`**。

## `sha1()`

计算字符串的 sha1 散列值

```php
string sha1 ( string $str [, bool $raw_output = false ] );
```

## `mcrypt_encrypt()`

使用给定参数加密明文

```php
string mcrypt_encrypt ( string $cipher , string $key , string $data , string $mode [, string $iv ] );
```

[详情](http://php.net/manual/zh/function.mcrypt-encrypt.php)

## `mcrypt_decrypt()`

使用给定参数解密密文

```php
string mcrypt_decrypt ( string $cipher , string $key , string $data , string $mode [, string $iv ] );
```

[详情](http://php.net/manual/zh/function.mcrypt-decrypt.php)

## `urlencode()`

编码 URL 字符串

```php
string urlencode ( string $str );
```

## `urldecode()`

解码已编码的 URL 字符串

```php
string urldecode ( string $str );
```

## `rawurlencode()`

按照 **RFC 3986** 对 URL 进行编码

```php
string rawurlencode ( string $str );
```

## `rawurldecode()`

对按照 **RFC 3986** 已编码的 URL 字符串进行解码

## `base64_encode()`

使用 **MIME base64** 对数据进行编码

```php
string base64_encode ( string $data );
```

## `base64_decode()`

对使用 **MIME base64** 编码的数据进行解码

```php
string base64_decode ( string $data [, bool $strict = false ] );
```
