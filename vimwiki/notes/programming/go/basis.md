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

## 预定义标识符

- `byte`
- `bool`
- `int`
- `int8`
- `int16`
- `int32`
- `int64`
- `uint`
- `uint8`
- `uint16`
- `uint32`
- `uint64`
- `float32`
- `float64`
- `string`
- `complex`
- `complex64`
- `complex128`
- `nil`
- `make`
- `new`
- `cap`
- `len`
- `append`
- `true`
- `false`
- `panic`
- `recover`
- `close`
- `copy`
- `imag`
- `iota`
- `real`
- `uintptr`
- `print`
- `println`

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

`const constName [type] = value`

可使用 `\` 作为多行的连续符使用

`iota` 可用作枚举，每次使用会自动加 1

## 运算符优先级

```
7   ^ !
6   * / % << >> & &^
5   + - | ^
4   == != < <= >= >
3   <-
2   &&
1   ||
```

## 字符类型

`\x` 紧跟长度为 2 的 16 进制数

`\u` 紧跟长度为 4 的 16 进制数

`\U` 紧跟长度为 8 的 16 进制数

## 字符串

字符串可能根据需要占用 1 至 4 个字节

字符串是根据长度限定

零值为长度为零的字符串，即空字符串 `""`

`len` 获取字符串所占的字节长度

字符串中的内容（ASCII）可以通过标准索引法来获取，在中括号 `[]` 内写入索引，索引从 0 开始计数

> 获取字符串中某个字节的地址的行为是非法的

### 字面值

#### 解释字符串

使用双引号括起来，其中的相关的转义字符将被替换

- `\n` : 换行符
- `\r` : 回车符
- `\t` : tab 键
- `\u` 或 `\U` : Unicode 字符
- `\\` : 反斜杠自身

#### 非解释字符串

使用反引号括起来，支持换行

### 字符串拼接

**字符串拼接符** `+`

循环中最好使用 `strings.Join()` 也可以使用字节缓冲（`bytes.Buffer`）

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

## 流程控制

### 条件判断

条件判断又称分支语，包括三类，即 `if`、`switch` 和 `select`。

#### `if`

```go
if optional;boolean {
    // code
} else if optional;boolean {
    // code
} else {
    // code
}
```

#### `switch`

##### 表达式开关

```go
switch optionalStatement;optionalExpression {
    case expressionList:
    // code
    default:
    // code
}
```

##### 类型开关

```go
switch optionalStatement;typeSwitchGuard {
    case typeList:
    // code
    default:
    // code
}
```

#### `select`

```go
select {
    case sendOrReceive: 
    // code
    default:
    // code

}
```

没有 `default` 语句的 `select` 语句会阻塞，只有当至少有一个通信 (接收或者发送) 到达时才完成阻塞

包含 `default` 语句的 `select` 语句是非阻塞的，并且会立即执行

### 循环控制

#### `for`

```go
// 无限循环
for {
    // code
}

// while 循环
for boolean {
    // code
}
 
// for 循环
for optionalPreStatement;boolean;optionalPostStatement {
    // code
}

// 字符
for index,char := range String{
    // code
}

// 数组或切片
for index,item := range ArrayOrSlice {
    // code
}

// 映射
for key, value := range Map {
    // code
}

// 通道
for item := range Channel {
    // code
}
```

### 无条件跳转

#### `break`

跳出当前循环

> 可跟标签跳出多重循环

#### `continue`

跳过本次循环

> 可跟标签跳出多重循环

#### `goto`

无条件地转移到过程中指定的行

## 函数

```go
func funcName(param) (return) {
    // code
}
```

### 变参

接受不定数量的参数，且具有相同类型 `type`

```go
func funcName(arg...type) {
    // code
}
```

### 延迟 (`defer`) 语句

可以在函数中添加多个 `defer` 语句。当函数执行到最后时，这些 `defer` 语句会按照逆序执行，最后该函数返回

### `init` 函数

定义时不能有任何的参数和返回值

一个包里可以写任意多个 `init` 函数，但建议只写一个

先执行 `init` 函数，再执行 `main` 函数

### `panic` 和 `recover`

`panic` 中断原有的控制流程，进入一个令人恐慌的流程

`recover` 让进入令人恐慌的流程中恢复过来。仅在延迟函数中有效，无还会 `nil`

## `import`

```go
import (
    // 绝对路径
    "fmt" // $GOPATH/src/fmt
    
    // 点操作
    . "fmt" // fmt.Println() -> Println()
    
    // 别名
    f "fmt" // f.Println()
    
    // _操作
    _ "fmt" // 调用包中 init
)
```

## `struct`

```go
type StructName struct {
    Property type
}
```

## `interface`

```go
type InterfaceName interface {
    funcName()
}
```
