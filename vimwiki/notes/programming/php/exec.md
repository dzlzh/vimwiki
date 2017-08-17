# PHP - 系统程序执行

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
