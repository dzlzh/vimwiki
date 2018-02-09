# [Go 指南 - 练习：斐波纳契闭包](https://tour.go-zh.org/moretypes/26)

## 练习：斐波纳契闭包

让我们用函数做些好玩的事情。

实现一个 `fibonacci` 函数，它返回一个函数（闭包）， 该闭包返回一个斐波纳契数列 `(0, 1, 1, 2, 3, 5, ...)` 。

## 提示代码

```go
package main

import "fmt"

// fibonacci is a function that returns
// a function that returns an int.
func fibonacci() func() int {
}

func main() {
	f := fibonacci()
	for i := 0; i < 10; i++ {
		fmt.Println(f())
	}
}
```

## 解答

```go
package main

import "fmt"

// fibonacci is a function that returns
// a function that returns an int.
func fibonacci() func() int {
	x := 0
	y := 1
	return func() int {
		f := x
		x, y = y, x+y
		return f
	}
}

func main() {
	f := fibonacci()
	for i := 0; i < 10; i++ {
		fmt.Println(f())
	}
}
```
