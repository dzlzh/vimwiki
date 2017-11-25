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
