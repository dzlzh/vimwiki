# PHP函数

```php
//发送原生 HTTP 头
void header ( string $string [, bool $replace = true [, int $http_response_code ]] )

//创建cookie
bool setcookie ( string $name [, string $value = "" [, int $expire = 0 [, string $path = "" [, string $domain = "" [, bool $secure = false [, bool $httponly = false ]]]]]] );

//对 JSON 格式的字符串进行解码
mixed json_decode ( string $json [, bool $assoc = false [, int $depth = 512 [, int $options = 0 ]]] );
/*
json
待解码的 json string 格式的字符串。
(这个函数仅能处理 UTF-8 编码的数据。)

assoc
当该参数为 TRUE 时，将返回 array 而非 object 。
*/

//对变量进行 JSON 编码
string json_encode ( mixed $value [, int $options = 0 [, int $depth = 512 ]] );

//将回调函数作用到给定数组的单元上
array array_map ( callable $callback , array $arr1 [, array $... ] );

//返回一个包含函数参数列表的数组
array func_get_args ( void );

//建立一个数组，包括变量名和它们的值
array compact ( mixed $varname [, mixed $... ] );

//解析一个配置文件
array parse_ini_file ( string $filename [, bool $process_sections = false [, int $scanner_mode = INI_SCANNER_NORMAL ]] );

//以千位分隔符方式格式化一个数字
string number_format ( float $number [, int $decimals = 0 ] );
string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," );

//子字符串替换
mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] );

//从数组中将变量导入到当前的符号表
int extract ( array &$var_array [, int $extract_type = EXTR_OVERWRITE [, string $prefix = NULL ]] );
/*
var_array
一个关联数组。此函数会将键名当作变量名，值作为变量的值。 对每个键／值对都会在当前的符号表中建立变量，并受到 extract_type 和 prefix 参数的影响。

必须使用关联数组，数字索引的数组将不会产生结果，除非用了 EXTR_PREFIX_ALL 或者 EXTR_PREFIX_INVALID。

extract_type
对待非法／数字和冲突的键名的方法将根据 extract_type 参数决定。可以是以下值之一：

EXTR_OVERWRITE
如果有冲突，覆盖已有的变量。
EXTR_SKIP
如果有冲突，不覆盖已有的变量。
EXTR_PREFIX_SAME
如果有冲突，在变量名前加上前缀 prefix。
EXTR_PREFIX_ALL
给所有变量名加上前缀 prefix。
EXTR_PREFIX_INVALID
仅在非法／数字的变量名前加上前缀 prefix。
EXTR_IF_EXISTS
仅在当前符号表中已有同名变量时，覆盖它们的值。其它的都不处理。 举个例子，以下情况非常有用：定义一些有效变量，然后从 $_REQUEST 中仅导入这些已定义的变量。
EXTR_PREFIX_IF_EXISTS
仅在当前符号表中已有同名变量时，建立附加了前缀的变量名，其它的都不处理。
EXTR_REFS
将变量作为引用提取。这有力地表明了导入的变量仍然引用了 var_array 参数的值。可以单独使用这个标志或者在 extract_type 中用 OR 与其它任何标志结合使用。
如果没有指定 extract_type，则被假定为 EXTR_OVERWRITE。

prefix
注意 prefix 仅在 extract_type 的值是 EXTR_PREFIX_SAME，EXTR_PREFIX_ALL，EXTR_PREFIX_INVALID 或 EXTR_PREFIX_IF_EXISTS 时需要。 如果附加了前缀后的结果不是合法的变量名，将不会导入到符号表中。前缀和数组键名之间会自动加上一个下划线。
*/

//建立一个数组，包括变量名和它们的值
array compact ( mixed $varname [, mixed $... ] );

//为cURL传输会话批量设置选项
bool curl_setopt_array ( resource $ch , array $options );
```

# PHP文件操作

```php
//PHP内置常量，目录分隔符
DIRECTORY_SEPARATOR

//新建目录
bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] )

//改变文件模式
bool chmod ( string $filename , int $mode )
  
//检查文件或目录是否存在
bool file_exists ( string $filename )

//返回路径中的目录部分
string dirname ( string $path )

//返回路径中的文件名部分
string basename ( string $path [, string $suffix ] )

//判断给定文件名是否是一个目录
bool is_dir ( string $filename )

//返回文件路径的信息
mixed pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] )
//PATHINFO_DIRNAME 目录
//PATHINFO_BASENAME 文件全名
//PATHINFO_EXTENSION 类型
//PATHINFO_FILENAME 文件名

//打开目录句柄
opendir()

//从目录句柄中读取条目
readdir()

//倒回目录句柄开头
rewinddir()

//关闭目录句柄
closedir()
```

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



