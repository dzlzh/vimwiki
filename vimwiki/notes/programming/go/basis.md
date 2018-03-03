# Go 基础

## 关键字

- `package`
- `import`
- `const`
- `var`
- `type`
- `func`
- `return`
- `interface`
- `map`
- `if`
- `else`
- `switch`
- `case`
- `default`
- `select`
- `for`
- `range`
- `continue`
- `break`
- `go`
- `chan`
- `defer`
- `struct`
- `goto`
- `fallthrough`

## 规则

大写字母开头的变量才可以被其他包读取，为公用变量；小写字母开头为私有变量，不可导出。

大写字母开头的函数也遵循上述规律

## 变量

`var variableName type`

`_`（下划线）是特殊变量名，任何赋予它的值都会被丢弃

```go
// 定义多个变量
var v1,v2,v3 string

// 定义变量并初始化值
var v1 int = 10

// 同时初始化多个变量
var v1,v2,v3 int = 6,7,8

// 简单声明赋值
a,b,c := 8,9,10
```

## 常量

`const constName type = value`

## 数组

`var arr [n]type`

下标从 0 开始

``` go
// 常规声明与赋值
var a [3]int
a[0] = 1
fmt.Println("The first number is %d\n",a[0]) //1
fmt.Println("The last number is %d\n",a[2]) //0

// 其他声明与赋值
a := [3]int{1,2,3} //声明长度为3并赋值
b := [5]int{1,2,3} //声明长度为5，并赋予前三个分别为1，2，3，其他为0
c := [...]int{1,2,3} //省略长度，又Go自动根据元素个数来计算长度

// 多维数组
multiArray := [2][3]int{{1,2,3},{4,5,6}}
```

## slice

`var sliceArr []type`

## map

`map[keyType]valueType`

## `make`

`make` 用于内建类型(`map`,`slice`,`channel`)的内存分配

## new 

`new` 用于各种类型的内存分配，`new` 返回指针，`new(T)` 分配了零值填充的 `T` 类型内存空间，返回一个 `*T` 类型的值
