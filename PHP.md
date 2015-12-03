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

```
