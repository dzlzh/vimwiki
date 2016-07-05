# PHP文件操作

```php
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
```

