# [练习：Reader](https://tour.go-zh.org/methods/22)

## 练习：Reader

实现一个 `Reader` 类型，它产生一个 `ASCII` 字符 `'A'` 的无限流。

## 提示代码

```go
package main

import "golang.org/x/tour/reader"

type MyReader struct{}

// TODO: Add a Read([]byte) (int, error) method to MyReader.

func main() {
	reader.Validate(MyReader{})
}
```

## 解答

```go
package main

import "golang.org/x/tour/reader"

type MyReader struct{}

// TODO: Add a Read([]byte) (int, error) method to MyReader.
func (r MyReader) Read(b []byte) (n int,e error) {
    b[0] = 'A'
    return 1,nil
 }

func main() {
	reader.Validate(MyReader{})
}
```
