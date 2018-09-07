# 知识点

## PHP7 中的 NULL合并运算符

```
$test ?? 1;
isset($test) ? $test : 1;
```

## 简洁的三元运算符

```
$test ?: 1;
$test ? $test : 1;
```

## PHP - 链式操作

**链式操作的核心部分是方法返回值是类本身**

类方法时，方法返回值为：

`return $this;`

类静态方法时，方法返回值为：

`return new self;`

## 函数调用效率

- 直接调用
- 变量函数调用
- [`call_user_func`](function.md#call_user_func) 调用
- [`call_user_func_array`](function.md#call_user_func_array) 调用

## [`declare`](http://php.net/manual/zh/control-structures.declare.php)

设定一段代码的执行指令

```php
declare (directive)
    statement
```

开启文件全部了函数调用与语句返回，都有一个“严格约束”的标题类型声明检查。

```php
declare(strict_type=1);
```
