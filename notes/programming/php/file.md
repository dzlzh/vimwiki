# PHP - 文件函数

## `DIRECTORY_SEPARATOR`

PHP内置常量，目录分隔符

```php
DIRECTORY_SEPARATOR
```

## `dir()`

返回一个 Directory 类实例

```php
Directory dir ( string $directory [, resource $context ] );
```

## `getcwd()`

取得当前工作目录

```php
string getcwd ( void );
```

## `scandir()`

列出指定路径中的文件和目录

```php
array scandir ( string $directory [, int $sorting_order [, resource $context ]] );
```

## `rewinddir()`

倒回目录名柄

```php
void rewinddir ( resource $dir_handle );
```

## `chroot()`

改变根目录

```php
bool chroot ( string $directory );
```

## `chdir()`

改变目录

```php
bool chdir ( string $directory );
```

## `opendir()`

打开目录名柄

```php
resource opendir ( string $path [, resource $context ] );
```

## `readdir()`

从目录名柄中读取条目

```php
string readdir ( [ resource $dir_handle ] );
```

## `closedir()`

关闭目录名柄

```php
void closedir ( [ resource $dir_handle ] );
```

## `mkdir()`

新建目录

```php
bool mkdir ( string $pathname [, int $mode = 0777 [, bool $recursive = false [, resource $context ]]] );
```

## `rmdir()`

删除目录

```php
bool rmdir ( string $dirname [, resource $context ] );
```

## `unlink()`

删除文件

```php
bool unlink ( string $filename [, resource $context ] );
```

## `chmod()`

改变文件模式

```php
bool chmod ( string $filename , int $mode );
```

## `copy()`

拷贝文件

```php
bool copy ( string $source , string $dest [, resource $context ] );
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

## `is_executable()`

判断给定文件名是否可执行

```php
bool is_executable ( string $filename );
```

## `is_file()`

判断给定文件名是否为一个正常的文件

```php
bool is_file ( string $filename );
```

## `is_link()`

判断给定文件名是否为一个符号连接

```php
bool is_link ( string $filename );
```

## `is_readable()`

判断给定文件名是否可读

```php
bool is_readable ( string $filename );
```

## `is_writable()`

判断给定的文件名是否可写

别名 `is_writeable()`

```php
bool is_writable ( string $filename );
```

## `is_uploaded_file()`

判断文件是否是通过 HTTP POST 上传的

```php
bool is_uploaded_file ( string $filename );
```

## `is_resource()`

检测变量是否为资源类型

```php
bool is_resource( mixed $var );
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

## [`filesize()`](https://secure.php.net/manual/zh/function.filesize.php)

取得文件大小

```php
int filesize ( string $filename );
```

## [`getimagesize()`](https://secure.php.net/manual/zh/function.getimagesize.php)

取得图像大小

```php
array getimagesize ( string $filename [, array &$imageinfo ] );
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

## `move_uploaded_file()`

将上传的文件移动到新位置

```php
bool move_uploaded_file ( string $filename , string $destination );
```

## `zip_open()`

打开 ZIP 存档文件

```php
resource zip_open ( string $filename );
```

## `zip_read()`

读取 ZIP 存档文件中下一项

```php
resource zip_read ( resource $zip );
```

## `zip_close()`

关闭一个 ZIP 档案文件

```php
void zip_close ( resource $zip );
```

## `zip_entry_open()`

打开用于读取的目录实体

```php
bool zip_entry_open ( resource $zip , resource $zip_entry [, string $mode ] );
```

## `zip_entry_name()`

检索目录项的名称

```php
string zip_entry_name ( resource $zip_entry );
```

## `zip_entry_filesize()`

检索目录实体的实际大小

```php
int zip_entry_filesize ( resource $zip_entry );
```

## `zip_entry_compressedsize()`

检索目录项压缩过后的大小

```php
int zip_entry_compressedsize ( resource $zip_entry );
```

## `zip_entry_compressionmethod()`

检索目录实体的压缩方法

```php
string zip_entry_compressionmethod ( resource $zip_entry );
```

## `zip_entry_read()`

读取一个打开了的压缩目录实体

```php
string zip_entry_read ( resource $zip_entry [, int $length = 1024 ] );
```

## `zip_entry_close()`

关闭目录项

```php
bool zip_entry_close ( resource $zip_entry );
```

## `tempnam()`

建立一个具有唯一文件名的文件

```php
string tempnam ( string $dir, string $prefix );
```

## [`tmpfile()`](http://php.net/manual/zh/function.tmpfile.php)

建立一个临时文件

```php
resource tmpfile ( void );
```

## `sys_get_temp_dir()`

返回用于临时文件的目录

```php
string sys_get_temp_dir( void );
```

## [`stream_get_meta_data`](http://php.net/manual/zh/function.stream-get-meta-data.php)

从封装协议文件指针中取得报头／元数据

```php
stream_get_meta_data ( int $fp ) : array
```
