# PHP - 字符串函数

## [`str_replace()`](http://php.net/manual/zh/function.str-replace.php)

子字符串替换

```php
mixed str_replace(mixed $search , mixed $replace , mixed $subject [, int &$count ]);
```

## `strtolower()`

将字符串转化为小写

```php
string strtolower(string $string);
```

## `strtoupper()`

将字符串转化为大写

```php
string strtoupper(string $string);
```

## [`ucfirst()`](https://secure.php.net/manual/zh/function.ucfirst.php)

将字符串的首字母转换为大写

```php
string ucfirst(string $str);
```

## [`lcfirst()`](https://secure.php.net/manual/zh/function.lcfirst.php)

将字符串的首字母转换为小写

```php
string lcfirst(string $str);
```

## [`ucwords()`](https://secure.php.net/manual/zh/function.ucwords.php)

将字符串中每个单词的首字母转换为大写

```php
string ucwords(string $str);
```

## [`strrpos()`](https://secure.php.net/manual/zh/function.strrpos.php)

计算指定字符串在目标字符串中最后一次出现的位置

```php
int strrpos(string $haystack , string $needle [, int $offset = 0 ]);
```

## [`ord()`](https://secure.php.net/manual/zh/function.ord.php)

返回字符的 ASCII 码值

```php
int ord(string $string);
```

## [`chr()`](https://secure.php.net/manual/zh/function.chr.php)

返回指定的字符

```php
string chr(int $ascii);
```

## [`strtr()`](https://secure.php.net/manual/zh/function.strtr.php)

转换指定字符

```php
string strtr(string $str , string $from , string $to);
string strtr(string $str , array $replace_pairs);
```

## [`chunk_split()`](https://secure.php.net/manual/zh/function.chunk-split.php)

将字符串分割成小块

```php
string chunk_split(string $body [, int $chunklen = 76 [, string $end = "\r\n" ]]);
```

## [`strval`](https://secure.php.net/manual/zh/function.strval.php)

获取变量的字符串值

```php
string strval(mixed $var);
```

## [`substr_replace`](http://php.net/manual/zh/function.substr-replace.php)

替换字符串的子串

```php
mixed substr_replace(mixed $string , mixed $replacement , mixed $start [, mixed $length ]);
```
