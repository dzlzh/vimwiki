# Go 基础

## 关键字

- `package`
- `import`
- `const`
- `var`
- `map`
- `type`
- `struct`
- `interface`
- `func`
- `return`
- `defer`
- `if`
- `else`
- `switch`
- `case`
- `default`
- `for`
- `range`
- `continue`
- `break`
- `fallthrough`
- `select`
- `chan`
- `go`
- `goto`

## 预定义标识符

### 内建常量

- `nil`
- `true`
- `false`
- `iota`

### 内建类型

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
- `uintptr`
- `float32`
- `float64`
- `complex64`
- `complex128`
- `string`
- `byte`
- `rune`
- `bool`
- `error`

### 内建函数

- `len`
- `make`
- `append`
- `new`
- `cap`
- `close`
- `copy`
- `complex`
- `real`
- `imag`
- `print`
- `println`
- `panic`
- `recover`

## 规则

导入 (import) 为路径，使用为包名

大写字母开头的变量才可以被其他包读取，为公用变量；小写字母开头为私有变量，不可导出。

大写字母开头的函数也遵循上述规律

`internal` 包**模块级私有**仅仅能被当前模块中的其他代码引用

当输入被断开为标记时，如果行末标记为：

- 一个标识符
- 一个整数、浮点数、虚数、字符或字符串文字
- 关键字 `break`、`continue`、`fallthrough` 或 `return` 中的一个
- 运算符和分隔符 `++`、`--`、`)`、`]` 或 `}` 中的一个

则分号将被自动插入到标记流中非空白行的末尾


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

## `init` 函数

定义时不能有任何的参数和返回值

一个包里可以写任意多个 `init` 函数，但建议只写一个

先执行 `init` 函数，再执行 `main` 函数

## 常量

`const constName [type] = value`

`iota` 可用作枚举，每次使用会自动加 1

可是无类型常量

```go
0       // 无类型整数
0.0     // 无类型浮点数
0i      // 无类型复数
"\u000" // 无类型字符

```

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

## 运算符

### [优先级](https://golang.org/ref/spec#Operator_precedence)

```
6    ^（按位取反） !
5    * / % << >> & &^
4    + - | ^（按位异或）
3    == != < <= > >=
2    &&
1    ||
```

### `%` 取模

`%` 取模运算符的符号和被取模的符号总是一致的

### `/` 除法

`/` 除法的行为依赖于操作数是否全为整数。
全为整数会向着 0 的方向截断余数

### `&^` 按位置零 (AND NOT)

`x&^y = x&(^y)`

如果对应 `y` 的 `bit` 位为 1 的话，
表达式 `z=x&^y` 结果 `z` 的对应的 `bit` 位为 0，
否则 `z` 对应的 `bit` 位等于 `x` 相应的 `bit` 位的值。

### `>>` 和 `<<` 移位

在 `x<<n` 和 `x>>n` 移位运算中，
决定了移位操作 `bit` 数部分必须是**无符号**数；
被操作数可以是有符号或无符号。

`x<<n` 等价于乘以 `2^n`

`x>>n` 等价于除以 `2^n`

`<<` 左移运算用零填充右边空缺的 `bit` 位，
无符号数的右移动也是用 0 填充左边空缺的 `bit` 位，
但是有符号数的右移动会用符号位的值填充左过空缺的 `bit` 位。

### `&&`（AND）和 `||`（OR）

**短路行为**

## 整型

intn 值域为 `-2^{n-1}` 到 `2^{n-1}-1`

uintn 值域为 0 到 `2^n-1`

算法运算的结果，
不管是有符号或者是无符号的，
如果需要更多的 `bit` 位才能正常表示的话，
说明计算结果溢出了。
超出的高位的 `bit` 位将被丢弃。

## 浮点数

`math.MaxFloat32` 表示 `float32` 能表示的最大数值。
大约 6 个十进制的精度。
`1bit`（符号位）`8bit`（指数位）`23bit`（尾数位）

`math.MaxFloat63` 表示 `float63` 能表示的最大数值。
大约 15 个十进制的精度。
`1bit`（符号位）`11bit`（指数位）`52bit`（尾数位）

## 字符类型

使用反引号（`）没有转义操作全部是原生面值，可多行

中文一字的大小为 `3`

一个八进制的转义形式 `\ooo`
三个 o 表示八进制数字。
不能超过 `\377`

一个十六进制的转义形式 `\xhh`
两个 h 表示十六进制数字

`\u` 紧跟长度为 4 的 16 进制数

`\U` 紧跟长度为 8 的 16 进制数

## 数组

由固定长度的特定类型元素组成的序列

`var arr [n]T`

下标从 0 开始

`...` 省略号根据初始化值的个数来计算


``` go
// 常规声明与赋值
var a [3]int
a[0] = 1
fmt.Println("The first number is %d\n",a[0]) //1
fmt.Println("The last number is %d\n",a[2]) //0

// 其他声明与赋值
a := [3]int{1,2,3} // 声明长度为 3 并赋值
b := [5]int{1,2,3} // 声明长度为 5，并赋予前三个分别为 1，2，3，其他为 0
c := [...]int{1,2,3} // 省略长度，又 Go 自动根据元素个数来计算长度
d := [...]string{0:"a", 1:"b"} // 可指定索引

// 多维数组
multiArray := [2][3]int{{1,2,3},{4,5,6}}
```

## slice

变长的序列，序列中每个元素都有相同的类型

由三个部分构成：

- **指针**指向底层数组元素的地址
- **长度**元素的数目 `len`
- **容量**从开始位置到底层数据的结尾位置 `cap`

> 为引用类型

`append` 可追加元素，容量会以双倍增加

```go
var sliceArr []T
make([]T, len, cap)
```

## map

无序的 key/value 对的集合

零值为 `nil`

> 为引用类型
> 不可进行取址操作

```go
map[KT]VT
make(map[KT]VT)

value, ok := map[K] // 可获取对应的值是否存在
```

`delete(map, K)` 删除元素

## 结构体 (struct)

由零个或多个任意类型的值聚合成的实体。
每个值称为结构体的成员。

```go
type StructName struct {
    Property type
}

var s StructName
s.Property = value

news1 := StructName{value}

news2 := StructName{Property: value}
```

声明一个成员对应的数据类型而不指名成员的名字；
这类成员就叫匿名成员。
匿名成员的数据类型必须是命名的类型或指向一个命名的类型的指针。

> 匿名成员只可以用 `.` 来初始化

## 指针

取地址符 `&`

一个指针变量可以指向任何一个值的内存地址

在 32 位机器上占用 4 个字节，在 64 位机器上占用 8 个字节

空指针值为 `nil`

任何一个变更 `var`， 如下表达式都是正确的：`var == *(&var)`

## `make`

`make` 用于内建类型 (`map`,`slice`,`channel`) 的内存分配

> `map`, `slice`, `channel` 为引用类型

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

继续执行后续分支代码使用 `fallthrough` 关键字

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

没有 `default` 语句的 `select` 语句会阻塞，只有当至少有一个通信 （接收或者发送） 到达时才完成阻塞

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

```
lable:
goto lable
break lable // 标签只可以定义到 for 前面，跳出循环
```

## 函数

```go
func funcName(param-list) (return-list) {
    // code
}
```

### 变参

接受不定数量的参数，且具有相同类型 `type`

```go
func funcName(arg...type) {
    // code
}
// interface{} 接收任意类型
```

### 延迟 (`defer`) 语句

可以在函数中添加多个 `defer` 语句。
当函数执行到最后时，
这些 `defer` 语句会按照逆序执行，
最后该函数返回。

执行顺序与声明顺序相反 (Stack)

### `panic` 和 `recover`

`panic` 中断原有的控制流程，进入一个令人恐慌的流程

`recover` 让进入令人恐慌的流程中恢复过来。仅在延迟函数中有效，无还会 `nil`

## 方法

在函数声明时，
在其名字之前放上一个变量，
即是一个方法。
这个附加的参数会将该函数附加到这种类型上，
即相当于为这种类型定义了一个独占的方法。

```go
func (var type) funcName(param-list) (return-list) {
    // code
}
```

## `interface`

```go
type InterfaceName interface {
    funcName()
}
```

## Goroutines

```go
go func()
```
## Channels

```go
ch := make(chan type)    // 无缓存
ch := make(chan type, 0) // 无缓存
ch := make(chan type, 1) // 有缓存大于零

ch <- x
x = <-ch
<-ch

close(ch)
```

### 单方向的 Channels

双向可以转单向，单向不可转双向

```go
send := make(chan<- type)    // 只发送不接收
receive := make(<-chan type) // 只接收不发送
```

### 带缓存的 Channels

```go
ch := make(chan type, 3)
len(ch) // 可查已有个数
cap(ch) // 可查容量
```

## go test

以 `_test.go` 为后缀名

- 测试函数
- 基准测试函数 (benchmark)
- 示例函数

### 测试函数

必须导入 `testing` 包

```go
func TestName(t *testing.T) {}
```
