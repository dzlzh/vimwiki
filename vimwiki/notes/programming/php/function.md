# PHP - 函数

## `header()`

发送原生HTTP头

```php
void header (string $string [, bool $replace = true [, int $http_response_code ]]);
```

## [`http_response_code`](https://secure.php.net/manual/zh/function.http-response-code.php)

获取/设置响应的 HTTP 状态码

> PHP >= 5.4.0

```
mixed http_response_code ([ int $response_code ] );
```

## `iconv()`

字符串按要求的字符编码来转换

```php
string iconv ( string $in_charset , string $out_charset , string $str );
```

## `mb_detect_encoding()`

检测字符的编码

```php
string mb_detect_encoding ( string $str [, mixed $encoding_list = mb_detect_order() [, bool $strict = false ]] );
```

## `setcookie()`

创建cookie

```php
bool setcookie ( string $name [, string $value = "" [, int $expire = 0 [, string $path = "" [, string $domain = "" [, bool $secure = false [, bool $httponly = false ]]]]]] );
```

## `http_build_query()`

生成 URL-encode 之后的请求字符串

```php
string http_build_query ( mixed $query_data [, string $numeric_prefix [, string $arg_separator [, int $enc_type = PHP_QUERY_RFC1738 ]]] );
```

使用给出的关联（或下标）数组生成一个经过 URL-encode 的请求字符串。

`query_data`

> 可以是数组或包含属性的对象。
>
> 一个 `query_data` 数组可以是简单的一维结构，也可以是由数组组成的数组（其依次可以包含其它数组）。
>
> 如果 `query_data` 是一个对象，只有 `public` 的属性会加入结果。

`numeric_prefix`

> 如果在基础数组中使用了数字下标同时给出了该参数，此参数值将会作为基础数组中的数字下标元素的前缀。
>
> 这是为了让 PHP 或其它 CGI 程序在稍后对数据进行解码时获取合法的变量名。

`arg_separator`

> 除非指定并使用了这个参数，否则会用 `arg_separator.output` 来分隔参数。

`enc_type`

> 默认使用 PHP_QUERY_RFC1738。
>
> 如果 `enc_type` 是 PHP_QUERY_RFC1738，则编码将会以 » RFC 1738 标准和 application/x-www-form-urlencoded 媒体类型进行编码，空格会被编码成加号（+）。
>
> 如果 `enc_type` 是 PHP_QUERY_RFC3986，将根据 » RFC 3986 编码，空格会被百分号编码（%20）。

## `json_decode()`

对 JSON 格式的字符串进行解码

```php
mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] );
```

`json`

> 待解码的 json string 格式的字符串。(这个函数仅能处理 UTF-8 编码的数据。)

`assoc`

> 当该参数为 TRUE 时，将返回 array 而非 object 。

##  `json_encode()`

对变量进行 JSON 编码

```php
string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] );
```

##  `serialize()`

产生一个可存储的值的表示-序列化

```php
string serialize ( mixed $value );
```

##  `unserialize()`

从已存储的表示中创建 PHP 的值-反序列化

```php
mixed unserialize ( string $str );
```

## `class_exists()`

检查类是否已定义

```php
bool class_exists ( string $class_name [, bool $autoload = true ] );
```

## [`method_exists()`](https://secure.php.net/manual/zh/function.method-exists.php)

检查类的方法是否存在

```php
bool method_exists ( mixed $object , string $method_name );
```

## `func_num_args()`

返回调用函数的传入参数个数

```php
int func_num_args ( void );
```

## `func_get_args()`

返回一个包含函数参数列表的数组

```php
array func_get_args ( void );
```

## [`parse_ini_file()`](https://secure.php.net/manual/zh/function.parse-ini-file.php)

解析一个配置文件

```php
array parse_ini_file ( string $filename [, bool $process_sections = false [, int $scanner_mode = INI_SCANNER_NORMAL ]] );
```

## [`parse_ini_string()`](https://secure.php.net/manual/zh/function.parse-ini-string.php)

解析配置字符串

```php
array parse_ini_string ( string $ini [, bool $process_sections = false [, int $scanner_mode = INI_SCANNER_NORMAL ]] );
```

## [`getenv()`](https://secure.php.net/manual/zh/function.getenv.php)

 获取一个环境变量的值

```php
string getenv ( string $varname );
```

## [`gethostbyname()`](https://secure.php.net/manual/zh/function.gethostbyname.php)

返回主机名对应的 IPv4 地址

```php
string gethostbyname ( string $hostname );
```

## [`ip2long()`](https://secure.php.net/manual/zh/function.ip2long.php)

将一个 IPV4 的字符串互联网协议转换成数字格式

```php
int ip2long ( string $ip_address );
```

## `number_format()`

以千位分隔符方式格式化一个数字

```php
string number_format ( float $number [, int $decimals = 0 ] );
string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," );
```

## `preg_replace()`

执行一个正则表达式的搜索和替换

```php
mixed preg_replace ( mixed $pattern , mixed $replacement , mixed $subject [, int $limit = -1 [, int &$count ]] )
```

搜索`subject`中匹配`pattern`的部分， 以`replacement`进行替换。

## `uniqid()`

生成一个唯一ID

```php
string uniqid ([ string $prefix = "" [, bool $more_entropy = false ]] );
```

## `sql_autoload_register()`

注册给定的函数作为 __autoload 的实现

```php
bool spl_autoload_register ([ callable $autoload_function [, bool $throw = true [, bool $prepend = false ]]] );
```

## `strncmp()`

二进制安全比较字符串开头的若干个字符

```php
int strncmp ( string $str1 , string $str2 , int $len );
```

**返回值**

> 如果 `str1` 小于 `str2` 返回 < 0； 如果 `str1` 大于 `str2` 返回 > 0；如果两者相等，返回 0。

## `unset()`

释放给定的变量

```php
void unset ( mixed $var [, mixed $... ] );
```

## `call_user_func()`

把第一个参数作为回调函数调用

```php
mixe call_user_func( callable $callback [, mixed $parameter [, mixed $...]]);
```

## `call_user_func_array()`

调用回调函数，并把一个数组参数作为回调函数的参数

```php
mixed call_user_func_array ( callable $callback , array $param_arr );
```

## `class_alias()`

为一个类创建别名

```php
bool class_alias ( string $original , string $alias [, bool $autoload = TRUE ] )；
```

## `ceil()`

进一法取整

```php
float ceil ( float $value );
```

## `floor()`

舍去法取整

```php
float floor ( float $value );
```

## `round()` 

对浮点数进行四舍五入

```php
float round ( float $val [, int $precision = 0 [, int $mode = PHP_ROUND_HALF_UP ]] );
```

## `is_numeric()`

检测变量是否为数字或数字字符串

```php
bool is_numeric ( mixed $var );
```

## `pack()`

将数据打包成二进制字符串

```php
string pack ( string $format [, mixed $args [, mixed $... ]] );
```

## `unpack()`

将二进制字符串进行解包

```php
array unpack ( string $format , string $data );
```

* `a` -- 将字符串空白以 NULL 字符填满
* `A` -- 将字符串空白以 SPACE 字符 (空格) 填满
* `h` -- 16 进制字符串，低位在前以半字节为单位
* `H` -- 16 进制字符串，高位在前以半字节为单位
* `c` -- 有符号字符
* `C` -- 无符号字符
* `s` -- 有符号短整数 (16 位，主机字节序)
* `S` -- 无符号短整数 (16 位，主机字节序)
* `n` -- 无符号短整数 (16 位, 大端字节序)
* `v` -- 无符号短整数 (16 位, 小端字节序)
* `i` -- 有符号整数 (依赖机器大小及字节序)
* `I` -- 无符号整数 (依赖机器大小及字节序)
* `l` -- 有符号长整数 (32 位，主机字节序)
* `L` -- 无符号长整数 (32 位，主机字节序)
* `N` -- 无符号长整数 (32 位, 大端字节序)
* `V` -- 无符号长整数 (32 位, 小端字节序)
* `f` -- 单精度浮点数 (依计算机的范围)
* `d` -- 双精度浮点数 (依计算机的范围)
* `x` -- 空字节
* `X` -- 倒回一位
* `@` -- 填入 NULL 字符到绝对位置


## `bin2hex()`

函数把包含数据的二进制字符串转换为十六进制值

```php
string bin2hex ( string $str )；
```

## `rand()`

产生一个随机整数

```php
int rand ( vodi );
int rand ( int $min, int $max );
```

## `mt_rand()`

生成更好的随机数

```php
int mt_rand ( void );
int mt_rand ( int $min, int $max );
```

## `srand()`

播下随机数发生器种子

```php
void srand ( [ int $seed ] );
```

## `mt_srand()`

播下一个更好的随机数发生器种子

```php
void mt_srand ( [ int $seed ] );
```

## `getrandmax()`

显示随机数最大的可能值

```php
int getrandmax ( void );
```

## `mt_getrandmax()`

显示 `mt_rand()` 随机数的最大可能值

```php
int mt_getrandmax ( void );
```

## [`trim()`](http://php.net/manual/zh/function.trim.php)

去除字符串首尾处的空白字符（或者其他字符）

```php
string trim ( string $str [, string $charlist = "\t\n\r\0\x0B" ] );
```

>" " (ASCII *32* (*0x20*))，普通空格符
>
>"\t" (ASCII *9* (*0x09*))，制表符
>
>"\n" (ASCII *10* (*0x0A*))，换行符
>
>"\r" (ASCII *13* (*0x0D*))，回车符
>
>"\0" (ASCII *0* (*0x00*))，空字节符
>
>"\x0B" (ASCII *11* (*0x0B*))，垂直制表符

## [`parse_url()`](https://secure.php.net/manual/zh/function.parse-url.php)

解析 URL，返回其组成部分

```php
mixed parse_url ( string $url [, int $component = -1 ] );
```

## [`sprintf()`](https://secure.php.net/manual/zh/function.sprintf.php)

把格式化的字符串写入变量中

```php
string sprintf ( string $format [, mixed $args [, mixed $... ]] );
```

## [`session_set_save_handler`](https://secure.php.net/manual/zh/function.session-set-save-handler.php)

设置用户自定义会话存储函数

```php
bool session_set_save_handler ( callable $open , callable $close , callable $read , callable $write , callable $destroy , callable $gc [, callable $create_sid ] );
```

## [`getimagesize`](https://secure.php.net/manual/zh/function.getimagesize.php)

取得图像大小

```php
array getimagesize ( string $filename [, array &$imageinfo ] );
```

- 索引 0 包含图像宽度的像素值
- 索引 1 包含图像高度的像素值
- 索引 2 是图像类型的标记：
  - 1 = GIF
  - 2 = JPG
  - 3 = PNG
  - 4 = SWF
  - 5 = PSD
  - 6 = BMP
  - 7 = TIFF(intel byte order)
  - 8 = TIFF(motorola byte order)
  - 9 = JPC
  - 10 = JP2
  - 11 = JPX
  - 12 = JB2
  - 13 = SWC
  - 14 = IFF
  - 15 = WBMP
  - 16 = XBM
- 索引 3 是文本字符串，内容为 “height="yyy"width="xxx"”，可直接用于 IMG 标记。


## [`sleep`](http://php.net/manual/zh/function.sleep.php)

延缓执行

```php
int sleep ( int $seconds );
```
成功时返回 0，错误时返回 `FALSE`。

如果函数的调用被一个信号中止，`sleep()` 会返回一个非零的值。在 Windows 上，该值总是 192（即 Windows API 常量 `WAIT_IO_COMPLETION` 的值）。其他平台上，该返回值是剩余未 `sleep` 的秒数。

## [`ignore_user_abort`](https://secure.php.net/manual/zh/function.ignore-user-abort.php)

设置客户端断开连接时是否中断脚本的执行

```
int ignore_user_abort ([ bool $value ] );
```

PHP 以命令行脚本执行时，当脚本终端结束，脚本不会被立即中止，除非设置 `value` 为 `TRUE`，否则脚本输出任意字符时会被中止。

## [`create_function`](https://secure.php.net/manual/zh/function.create-function.php)

创建一个匿名函数

```php
string create_function ( string $args , string $code );
```
