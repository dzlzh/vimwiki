# PHP 函数可变数量的参数列表

## PHP5.5 及更早版本

使用以下函数：

- [`func_num_args`](https://secure.php.net/manual/zh/function.func-num-args.php) 返回参数的总数量
- [`func_get_arg`](https://secure.php.net/manual/zh/function.func-get-arg.php) 返回参数列表的某一项
- [`func_get_args`](https://secure.php.net/manual/zh/function.func-get-args.php) 返回一个包含函数参数列表的数组

```php
function test()
{
    echo '参数总数；', func_num_args(), "\n";
    echo '第一个参数：', func_get_arg(0), "\n";
    echo '全部参数；';
    print_r(func_get_args());
}

test(1, 2, 3, 4);

/*
参数总数；4
第一个参数：1
全部参数；Array
(
   [0] => 1
   [1] => 2
   [2] => 3
   [3] => 4
)
*/
```

## PHP5.6 及以上版本

使用 `...` 语法实现

```php
function test(...$params)
{
    print_r($params);
}

test(1, 2, 3, 4);

/*
Array         
(             
    [0] => 1  
    [1] => 2  
    [2] => 3  
    [3] => 4  
)
*/
```
