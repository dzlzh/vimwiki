# Go

## 导入

**关键字**

`import`

## 函数

**关键字**

`func`

## 类型

- `bool`
- `string`
- `int` `int8` `int16` `int32` `int64`
- `uint` `uint8` `uint16` `uint32` `uint64` `uintptr`
- `byte` - `uint8` 的别名
- `rune` - `int32` 的别名，代表一个 Unicode 码
- `float32` `float64`
- `complex64` `complex128`

**类型转换**

`T(v)` 将值 `v` 转换为类型 `T`

## 常量

**关键字**

`const`

```go
const identifier [type] = value
```

**值**

- `string`
- `bool`
- 数值型 (`int` `float` 复数)

## 变量

**关键字**

`var`

```go
var identifier type
var identifier [type] = value
// 局部变量
identifier :- value
```

> 可以通过 `&` 来获取变量的内存地址
> 空白标识符 `_` 抛弃值

## init 函数

`init` 函数是非常特殊的函数，它不能够被人为调用，而是在每个包完成初始化后自动执行，并且执行优先级比 main 函数高。
每一个源文件都可以包含一个或多个 init 函数。

## 运算符

### 逻辑运算

**一元运算符**

- `!` 非运算符

**二元运算符**

- `==` 相等运算符
- `!=` 不等运算符
- `&&` 和运算符
- `||` 或运算符

### 位运算

**一元运算符**

- `^` 按位补足
- `<<` 位左移
- `>>` 位右移

**二元运算符**

- `&` 按位与
- `|` 按位或
- `^` 按位异或

## 流程控制语句

### `for`

Go 中只有一个 `for` 循环

```
for i := 0; i < 10; i++ {
    // code
}
```

初始化语句和后置语句是可选的
> 可省略 `;` 相当于 C 中的 `while`

```
sum := 0;
for ; sum < 1000; {
    sum += sum
}
for sum < 1000 {
    sum += sum
}
```

死循环
> 省略循环条件

```
for {
    // code
}
```

### `if`

```
if 1 > 0 {
    // code
}

// 变量域只在 if 中
if v := 1; v < 10 {
    fmt.Println(i)
} else {
    fmt.Println(i)
}
```
