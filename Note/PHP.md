# PHP函数

## `header()`

发送原生HTTP头

```php
void header (string $string [, bool $replace = true [, int $http_response_code ]])
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

## `func_get_args()`

返回一个包含函数参数列表的数组

```php
array func_get_args ( void );
```

## `parse_ini_file()`

解析一个配置文件

```php
array parse_ini_file ( string $filename [, bool $process_sections = false [, int $scanner_mode = INI_SCANNER_NORMAL ]] );
```

## `number_format()`

以千位分隔符方式格式化一个数字

```php
string number_format ( float $number [, int $decimals = 0 ] );
string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," );
```

## `str_replace()`

子字符串替换

```php
mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] );
```

## `uniqid()`

生成一个唯一ID

```php
string uniqid ([ string $prefix = "" [, bool $more_entropy = false ]] );
```

## `strtolower()`

将字符串转化为小写

```php
string strtolower ( string $string );
```

## `strtoupper()`

将字符串转化为大写

```php
string strtoupper ( string $string );
```



# PHP数组函数

## `compact()`

建立一个数组，包括变量名和它们的值

```php
array compact ( mixed $varname [, mixed $... ] );
```

## `extract()`

从数组中将变量导入到当前的符号表

```php
int extract ( array &$var_array [, int $extract_type = EXTR_OVERWRITE [, string $prefix = NULL ]] );
```

`var_array`

> 一个关联数组。此函数会将键名当作变量名，值作为变量的值。 对每个键／值对都会在当前的符号表中建立变量，并受到 `extract_type` 和 `prefix` 参数的影响。
>
> 必须使用关联数组，数字索引的数组将不会产生结果，除非用了 `EXTR_PREFIX_ALL` 或者 `EXTR_PREFIX_INVALID`。

`extract_type`

> 对待非法／数字和冲突的键名的方法将根据 `extract_type` 参数决定。可以是以下值之一：
>
> `EXTR_OVERWRITE` 
> 如果有冲突，覆盖已有的变量。
>
> `EXTR_SKIP` 
> 如果有冲突，不覆盖已有的变量。
>
> `EXTR_PREFIX_SAME` 
> 如果有冲突，在变量名前加上前缀 `prefix`。
>
> `EXTR_PREFIX_ALL` 
> 给所有变量名加上前缀 prefix。
>
> `EXTR_PREFIX_INVALID`
> 仅在非法／数字的变量名前加上前缀 `prefix`。
>
> `EXTR_IF_EXISTS` 
> 仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。 举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
>
> `EXTR_PREFIX_IF_EXISTS` 
> 仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
>
> `EXTR_REFS` 
> 将变量作为引用提取。这有力地表明了导入的变量仍然引用了 `var_array` 参数的值。可以单独使用这个标志或者在 `extract_type` 中用 `OR` 与其它任何标志结合使用。
>
> 如果没有指定 `extract_type`，则被假定为 `EXTR_OVERWRITE`。

`prefix`

> 注意 prefix 仅在 extract_type 的值是 EXTR_PREFIX_SAME，EXTR_PREFIX_ALL，EXTR_PREFIX_INVALID 或 EXTR_PREFIX_IF_EXISTS 时需要。 如果附加了前缀后的结果不是合法的变量名，将不会导入到符号表中。前缀和数组键名之间会自动加上一个下划线。

## `array_unique()`

移除数组中重复的值

```php
array array_unique ( array $array [, int $sort_flags = SORT_STRING ] );
```

> SORT_STRING - 默认。把项目作为字符串来比较。
>
> SORT_REGULAR - 把每一项按常规顺序排列（Standard ASCII，不改变类型）。
>
> SORT_NUMERIC - 把每一项作为数字来处理。
>
> SORT_LOCALE_STRING - 把每一项作为字符串来处理，基于当前区域设置（可通过 setlocale() 进行更改）。

## `array_key_exists()`

检查给定的键名或索引是否存在于数组中

```php
bool array_key_exists ( mixed $key , array $search );
```

##  `array_map()`

将回调函数作用到给定数组的单元上

```php
array array_map ( callable $callback , array $arr1 [, array $... ] );
```

## `array_multisort()`

对多个数组或多维数组进行排序

```php
bool array_multisort ( array &$arr [, mixed $arg = SORT_ASC [, mixed $arg = SORT_REGULAR [, mixed $... ]]] );
```

可以用来一次对多个数组进行排序，或者根据某一维或多维对多维数组进行排序。

关联（[string](http://php.net/manual/zh/language.types.string.php)）键名保持不变，但数字键名会被重新索引。

排序顺序标志：

* **SORT_ASC** - 按照上升顺序排序
* **SORT_DESC** - 按照下降顺序排序

排序类型标志：

* **SORT_REGULAR** - 将项目按照通常方法比较
* **SORT_NUMERIC** - 将项目按照数值比较
* **SORT_STRING** - 将项目按照字符串比较

## `asort()`

对数组进行排序并保持索引关系，由低到高

```php
bool asort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

**参数**

`sort_flags`

* **SORT_REGULAR** - 正常比较单元（不改变类型）
* **SORT_NUMERIC** - 单元被作为数字来比较
* **SORT_STRING** - 单元被作为字符串来比较
* **SORT_LOCALE_STRING** - 根据当前的区域（locale）设置来把单元当作字符串比较，可以用 [setlocale()](http://php.net/manual/zh/function.setlocale.php) 来改变。
* **SORT_NATURAL** - 和 [natsort()](http://php.net/manual/zh/function.natsort.php) 类似对每个单元以“自然的顺序”对字符串进行排序。 PHP 5.4.0 中新增的。
* **SORT_FLAG_CASE** - 能够与 **SORT_STRING** 或 **SORT_NATURAL** 合并（OR 位运算），不区分大小写排序字符串。

**返回值**

成功时返回 **TRUE**， 或者在失败时返回 **FALSE**。

## `arsort()`

对数组进行逆向排序并保持索引关系，由高到低

```php
bool arsort ( array &$array [, int $sort_flags = SORT_REGULAR ] );
```

> 同`asort()`



# PHP执行外部命令函数

## `exec()`

执行一个外部程序

```php
string exec ( string $command [, array &$output [, int &$return_var ]] );
```

> 命令执行结果的最后一行内容。 如果你需要获取未经处理的全部输出数据， 请使用 `passthru()` 函数。
>
> 如果想要获取命令的输出内容， 请确保使用 `output`参数。

## `passthru()`

执行外部程序并且显示原始输出

```php
void passthru ( string $command [, int &$return_var ] );
```

##  `system()`

执行外部程序，并且显示输出

```php
string system ( string $command [, int &$return_var ] );
```

成功则返回命令输出的最后一行， 失败则返回 FALSE

##  `shell_exec()`

通过 shell 环境执行命令，并且将完整的输出以字符串的方式返回

```php
string shell_exec ( string $cmd );
```

##  执行运算符 - 反引号（``）

```php
echo `ls -al`;
```



# PHP文件操作

## `DIRECTORY_SEPARATOR`

PHP内置常量，目录分隔符

```php
DIRECTORY_SEPARATOR
```

## `mkdir()`

新建目录

```php
bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] );
```

## `chmod()`

改变文件模式

```php
bool chmod ( string $filename , int $mode );
```

## `file_exists()`

检查文件或目录是否存在

```php
bool file_exists ( string $filename );
```

## `dirname()`

返回路径中的目录部分

```php
string dirname ( string $path );
```

## `basename()`

返回路径中的文件名部分

```php
string basename ( string $path [, string $suffix ] );
```

## `is_dir()`

判断给定文件名是否是一个目录

```php
bool is_dir ( string $filename );
```

## `pathinfo()`

返回文件路径的信息

```php
mixed pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] );
```
> `PATHINFO_DIRNAME` 目录
>
> `PATHINFO_BASENAME` 文件全名
>
> `PATHINFO_EXTENSION` 类型
>
> `PATHINFO_FILENAME` 文件名

## `opendir()`

打开目录句柄

```php
opendir();
```

## `readdir()`

从目录句柄中读取条目

```php
readdir();
```

## `rewinddir()`

倒回目录句柄开头

```php
rewinddir();
```

## `closedir()`

关闭目录句柄

```php
closedir();
```

## `glob()`

寻找与模式匹配的文件路径

```php
array glob ( string $pattern [, int $flags = 0 ] );
```
返回一个包含有匹配文件／目录的数组。如果出错返回 FALSE。

> GLOB_MARK - 在每个返回的项目中加一个斜线
>
> GLOB_NOSORT - 按照文件在目录中出现的原始顺序返回（不排序）
>
> GLOB_NOCHECK - 如果没有文件匹配则返回用于搜索的模式
>
> GLOB_NOESCAPE - 反斜线不转义元字符
>
> GLOB_BRACE - 扩充 {a,b,c} 来匹配 'a'，'b' 或 'c'
>
> GLOB_ONLYDIR - 仅返回与模式匹配的目录项
>
> GLOB_ERR - 停止并读取错误信息（比如说不可读的目录），默认的情况下忽略所有错误

## `getcwd()`

取得当前工作目录

```php
string getcwd(void);
```
成功则返回当前工作目录，失败返回 FALSE。

## `realpath()`

返回规范化的绝对路径名

```php
string realpath ( string $path );
```

## `scandir()`

列出指定路径中的文件和目录

```php
array scandir ( string $directory [, int $sorting_order [, resource $context ]] );
```

## `file_get_contents()`

将整个文件读入一个字符串

```php
string file_get_contents ( string $filename [, bool $use_include_path = false [, resource $context [, int $offset = -1 [, int $maxlen ]]]] );
```

## `file_put_contents()`

将一个字符串写入文件

```php
int file_put_contents ( string $filename , mixed $data [, int $flags = 0 [, resource $context ]] );
```



# CURL

##  `curl_setopt_array()`

为cURL传输会话批量设置选项

```php
bool curl_setopt_array ( resource $ch , array $options );
```

## CURLFile 类

```php
CURLFile {
    /* 属性 */
    public $name ;
    public $mime ;
    public $postname ;

    /* 方法 */
    public __construct ( string $filename [, string $mimetype [, string $postname ]] )
    public string getFilename ( void )
    public string getMimeType ( void )
    public string getPostFilename ( void )
    public void setMimeType ( string $mime )
    public void setPostFilename ( string $postname )
    public void __wakeup ( void )
}
```

> `CURLFile` 应该与选项 `CURLOPT_POSTFIELDS` 一同使用用于上传文件。



# php://

**php:// — 访问各个输入/输出流（I/O streams）**

PHP 提供了一些杂项输入/输出（IO）流，允许访问 PHP 的输入输出流、标准输入输出和错误描述符， 内存中、磁盘备份的临时文件流以及可以操作其他读取写入文件资源的过滤器。

## `php://stdin`,`php://stdout`和`php://stderr`

`php://stdin`、`php://stdout` 和 `php://stderr` 允许直接访问 PHP 进程相应的输入或者输出流。 数据流引用了复制的文件描述符，所以如果你打开 `php://stdin` 并在之后关了它， 仅是关闭了复制品，真正被引用的 **STDIN** 并不受影响。 注意 PHP 在这方面的行为有很多 BUG 直到 PHP 5.2.1。 推荐你简单使用常量 **STDIN**、 **STDOUT** 和 **STDERR** 来代替手工打开这些封装器。

`php://stdin` 是只读的， `php://stdout` 和 `php://stderr` 是只写的。

## `php://input`

`php://input` 是个可以访问请求的原始数据的只读流。 POST 请求的情况下，最好使用`php://input` 来代替 [$HTTP_RAW_POST_DATA](http://php.net/manual/zh/reserved.variables.httprawpostdata.php)，因为它不依赖于特定的 php.ini 指令。 而且，这样的情况下 [$HTTP_RAW_POST_DATA](http://php.net/manual/zh/reserved.variables.httprawpostdata.php) 默认没有填充， 比激活[always_populate_raw_post_data](http://php.net/manual/zh/ini.core.php#ini.always-populate-raw-post-data) 潜在需要更少的内存。 *enctype="multipart/form-data"* 的时候 `php://input` 是无效的。

> 在 PHP 5.6 之前 `php://input` 打开的数据流只能读取一次； 数据流不支持 seek 操作。 不过，依赖于 SAPI 的实现，请求体数据被保存的时候， 它可以打开另一个`php://input` 数据流并重新读取。 通常情况下，这种情况只是针对 POST 请求，而不是其他请求方式，比如 PUT 或者 PROPFIND。

## `php://output`

`php://output` 是一个只写的数据流， 允许你以 [print](http://php.net/manual/zh/function.print.php) 和 [echo](http://php.net/manual/zh/function.echo.php) 一样的方式 写入到输出缓冲区。

## `php://fd`

`php://fd` 允许直接访问指定的文件描述符。 

## `php://memory` 和 `php://temp`

`php://memory` 和 `php://temp` 是一个类似文件 包装器的数据流，允许读写临时数据。 两者的唯一区别是 `php://memory` 总是把数据储存在内存中， 而 `php://temp` 会在内存量达到预定义的限制后（默认是 2MB）存入临时文件中。 临时文件位置的决定和 [sys_get_temp_dir()](http://php.net/manual/zh/function.sys-get-temp-dir.php) 的方式一致。

`php://temp` 的内存限制可通过添加 */maxmemory:NN* 来控制，*NN* 是以字节为单位、保留在内存的最大数据量，超过则使用临时文件。

## `php://filter`

`php://filter` 是一种元封装器， 设计用于数据流打开时的[筛选过滤](http://php.net/manual/zh/filters.php)应用。 这对于一体式（all-in-one）的文件函数非常有用，类似 [readfile()](http://php.net/manual/zh/function.readfile.php)、 [file()](http://php.net/manual/zh/function.file.php) 和 [file_get_contents()](http://php.net/manual/zh/function.file-get-contents.php)， 在数据流内容读取之前没有机会应用其他过滤器。

`php://filter` 目标使用以下的参数作为它路径的一部分。 复合过滤链能够在一个路径上指定。详细使用这些参数可以参考具体范例。



# PHP静态(Static)关键字

- 静态属性用于保存类的公有数据
- 静态方法里只能访问静态属性
- 静态成员不需要实例化对象就可以访问
- 类的内部可以通过`self`或者`static`关键字访问自身静态成员可以通过`parent`关键字访问父类的静态成员
- 可以通过类的名称在类定义外部访问静态成员



# PHP命令行参数

- `$argv`是一个数组，包含了提供的参数，第一个参数总是脚本文件名字
- `$argc`包含了`$argv`数组包含元素的数目



# PHP安全

## 变量的处理

 __web程序中所有`get` `post` `cookies` `update_files`来的变量都是不可信的__

- 输入的变量组成mysql SQL前都要用`mysql_real_escape_string()`处理

- 输入的变量回显在页面或者存入数据库钱都要用`htmlspecialchars()`函数处

- 对于传入的整数或浮点数可以使用`intval()`或`floatval()`处理

- 关闭`magic_quotes_runtime`安全掌握到自己的手里 `set_magic_quotes_runtime(false) `

## 数据加密

__序列化 -> 加密 -> 解密 -> 反序列化__

```php
$userinfo = '信息'; //用户信息
$secureKey = '密钥'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
echo "用户信息加密前：".$str;
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secureKey, $str, MCRYPT_MODE_ECB));
echo "用户信息加密后：".$str;
//将加密后的用户数据存储到cookie中
setcookie('userinfo', $str); 
//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secureKey, base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：\n";
var_dump($uinfo);
```

## 密码加密

```php
$password = '密码';
$salt = substr(uniqid(rand()), -6);
echo $salt . "\n";
$password = md5(md5($password).$salt);
echo $password;
```



# PHP小技巧

- foreach效率更高，尽量用`foreach`代替`while`和`for`循环

- 循环内部不要声明变量，尤其是对象这样的变量

- 循环里别用函数

- 在多重嵌套循环中，如有可能，应当将最长的循环放在内层，最短循环放在外层，从而减少cpu跨循环层的次数，优化程序性能

- 用单引号替代双引号引用字符串以实现PHP性能优化

- 用`i+=1`代替`i=i+1`。符合c/c++的习惯，效率还高

- 优化Select SQL语句，在可能的情况下尽量少的进行`Insert`、`Update`操作，达到PHP性能优化的目的

- 某些地方使用`isset`代替`strlen`

- 尽量的少进行文件操作，虽然PHP的文件操作效率也不低的

- 尽可能的使用PHP内部函数

- 在可以用PHP内部字符串操作函数的情况下，不要用正则表达式

- 在可以用`file_get_contents`替代`file`、`fopen`、`feof`、`fgets`等系列方法的情况下，尽量用`file_get_contents`，因为它的效率高得多。但是要注意`file_get_contents`在打开一个URL文件时候的PHP版本问题

- 不要随便就复制变量

- Apache解析一个PHP脚本的时间要比解析一个静态HTML页面慢2至10倍。尽量多用静态HTML页面，少用脚本

- 试着喜欢使用三元运算符`(?：)`

- 使用选择分支语句，`switch case`好于使用多个`if`，`else if`语句,并且代码更加容易阅读和维护

- 当`echo`字符串时用逗号代替点连接符更快些。`echo`一种可以把多个字符串当作参数的“函数”。`echo`是语言结构，不是真正的函数，故把函数加上了双引号

- 去除HTML标签以及空格换行等字符`preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/", "", strip_tags($str))`

- 目录分隔符 `DIRECTORY_SEPARATOR`

- 多路径分隔符 `PATH_SEPARATOR`

- `bool || die()`



# PHP运算符优先级

| 结合方向 |                   运算符                    |      附加信息       |
| :--: | :--------------------------------------: | :-------------: |
|  无   |              `clone` `new`               | `clone` 和 `new` |
|  左   |                   `[`                    |    `array()`    |
|  右   |                   `**`                   |      算术运算符      |
|  右   | `++` `--` `~` `(int)` `(float)` `(string)` `(array)` `(object)` `(bool)` `@` |    类型和递增／递减     |
|  无   |               `instanceof`               |       类型        |
|  右   |                   `!`                    |      逻辑运算符      |
|  左   |               `*` `/` `%`                |      算术运算符      |
|  左   |               `+` `-` `.`                |  算术运算符和字符串运算符   |
|  左   |                `<<` `>>`                 |      位运算符       |
|  无   |            `<` `<=` `>` `>=`             |      比较运算符      |
|  无   |     `==` `!=` `===` `!==` `<>` `<=>`     |      比较运算符      |
|  左   |                   `&`                    |     位运算符和引用     |
|  左   |                   `^`                    |      位运算符       |
|  左   |                   `\|`                   |      位运算符       |
|  左   |                   `&&`                   |      逻辑运算符      |
|  左   |                  `\|\|`                  |      逻辑运算符      |
|  左   |                   `??`                   |      比较运算符      |
|  左   |                  `? :`                   |     ternary     |
|  右   | `=` `+=` `-=` `*=` `**=` `/=` `.=` `%=` `&=` `\|=` `^=` `<<=` `>>=` |      赋值运算符      |
|  左   |                  `and`                   |      逻辑运算符      |
|  左   |                  `xor`                   |      逻辑运算符      |
|  左   |                   `or`                   |      逻辑运算符      |



# PHP规范标准

## 命名

- 函数命名时建议使用小写字母加下划线，如`test_function`；
- 类命名时建议使用大驼峰式命名法，如`TestClass`；
- 方法命名时建议使用小驼峰式命名法，如`testFunction`；
- 属性命名时建议使用小驼峰式命名法，如`testName`；
- 常量命名时建议使用大写字母加下划线，如`TEST_NAME`；

> [驼峰式大小写](https://zh.wikipedia.org/wiki/%E9%A7%9D%E5%B3%B0%E5%BC%8F%E5%A4%A7%E5%B0%8F%E5%AF%AB)
>
> **驼峰式大小写**（**Camel-Case**，**Camel Case**，**camel case**），[电脑](https://zh.wikipedia.org/wiki/%E9%9B%BB%E8%85%A6)[程序](https://zh.wikipedia.org/wiki/%E7%A8%8B%E5%BC%8F)编写时的一套命名规则（惯例）。
>
> 当[变量](https://zh.wikipedia.org/wiki/%E8%AE%8A%E6%95%B8)名和[函数](https://zh.wikipedia.org/wiki/%E5%87%BD%E5%BC%8F)名称是由二个或多个[单字](https://zh.wikipedia.org/wiki/%E5%96%AE%E5%AD%97)链接在一起，而构成的唯一[识别字](https://zh.wikipedia.org/w/index.php?title=%E8%AD%98%E5%88%A5%E5%AD%97&action=edit&redlink=1)时，利用“驼峰式大小写”来表示，可以增加变量和函数的可读性。
>
> “驼峰式大小写（Camel-Case）一词来自[Perl](https://zh.wikipedia.org/wiki/Perl)语言中普遍使用的大小写混合格式，而Larry Wall等人所著的畅销书《Programming Perl》（[O'Reilly](https://zh.wikipedia.org/wiki/O%27Reilly)出版）的封面图片正是一匹[骆驼](https://zh.wikipedia.org/wiki/%E9%A7%B1%E9%A7%9D)。”[[1\]](https://zh.wikipedia.org/wiki/%E9%A7%9D%E5%B3%B0%E5%BC%8F%E5%A4%A7%E5%B0%8F%E5%AF%AB#cite_note-1)
>
> “驼峰式大小写”命名规则可视为一种惯例，并无绝对与强制，为的是增加识别和可读性。一旦选用或设置好命名规则，在程序编写时应保持一致格式。