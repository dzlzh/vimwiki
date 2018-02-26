# [练习：错误](https://tour.go-zh.org/methods/20)

## 练习：错误

从之前的练习中复制 `Sqrt` 函数，修改它使其返回 `error` 值。

`Sqrt` 接受到一个负数时，应当返回一个非 `nil` 的错误值。复数同样也不被支持。

创建一个新的类型

```go
type ErrNegativeSqrt float64
```

并为其实现

```go
func (e ErrNegativeSqrt) Error() string
```

方法使其拥有 `error` 值，通过 `ErrNegativeSqrt(-2).Error()` 调用该方法应返回 `"cannot Sqrt negative number: -2"`。

> **注意**：在 `Error` 方法内调用 `fmt.Sprint(e)` 会让程序陷入死循环。可以通过先转换 `e` 来避免这个问题： `fmt.Sprint(float64(e))`

## 提示代码

```go
package main

import (
	"fmt"
)

func Sqrt(x float64) (float64, error) {
	return 0, nil
}

func main() {
	fmt.Println(Sqrt(2))
	fmt.Println(Sqrt(-2))
}
```

## 解答

```go
package main

import (
	"fmt"
)

type ErrNegativeSqrt float64

func (e ErrNegativeSqrt) Error() string {
	return fmt.Sprintf("cannot Sqrt negative number:%v", float64(e))
}

func Sqrt(x float64) (float64, error) {
	if x < 0 {
		return 0, ErrNegativeSqrt(x)
	} else {
		z, d, i := 1.0, 1000.0, 1
		for {
			old := z
			fmt.Printf("第%v次循环\n", i)
			z = z - (z*z-x)/(2*z)
			fmt.Println(z)
			if uint(d*old) == uint(d*z) {
				break
			}
			i++
		}
		fmt.Println("-----")
		return z, nil
	}
}

func main() {
	fmt.Println(Sqrt(2))
	fmt.Println(Sqrt(-2))
}
```
