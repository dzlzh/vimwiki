### PHP函数

```php
//创建cookie
bool setcookie ( string $name [, string $value = "" [, int $expire = 0 [, string $path = "" [, string $domain = "" [, bool $secure = false [, bool $httponly = false ]]]]]] )

//解析一个配置文件
array parse_ini_file ( string $filename [, bool $process_sections = false [, int $scanner_mode = INI_SCANNER_NORMAL ]] )

//以千位分隔符方式格式化一个数字
string number_format ( float $number [, int $decimals = 0 ] )
string number_format ( float $number , int $decimals = 0 , string $dec_point = "." , string $thousands_sep = "," )

//子字符串替换
mixed str_replace ( mixed $search , mixed $replace , mixed $subject [, int &$count ] )

//从数组中将变量导入到当前的符号表
int extract ( array &$var_array [, int $extract_type = EXTR_OVERWRITE [, string $prefix = NULL ]] )
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
array compact ( mixed $varname [, mixed $... ] )
```
