# [练习：rot13Reader](https://tour.go-zh.org/methods/23)

## 练习：rot13Reader

有种常见的模式是一个 `io.Reader` 包装另一个 `io.Reader`，然后通过某种方式修改其数据流。

例如，`gzip.NewReader` 函数接受一个 `io.Reader` （已压缩的数据流）并返回一个同样实现了 `io.Reader` 的 `*gzip.Reader` （解压后的数据流）。

编写一个实现了 `io.Reader` 并从另一个 `io.Reader` 中读取数据的 `rot13Reader` ， 通过应用 `rot13` 代换密码对数据流进行修改。

`rot13Reader` 类型已经提供。实现 `Read` 方法以满足 `io.Reader`。

## 提示代码

```go
package main

import (
	"io"
	"os"
	"strings"
)

type rot13Reader struct {
	r io.Reader
}

func main() {
	s := strings.NewReader("Lbh penpxrq gur pbqr!")
	r := rot13Reader{s}
	io.Copy(os.Stdout, &r)
}
```

## 解答

```go
package main

import (
	"io"
	"os"
	"strings"
)

type rot13Reader struct {
	r io.Reader
}

func (rot *rot13Reader) Read(p []byte) (n int, err error) {
	n, err = rot.r.Read(p)
	for i := 0; i < n; i++ {
		if (p[i] >= 'A' && p[i] < 'N') || (p[i] >= 'a' && p[i] < 'n') {
			p[i] += 13
		} else if (p[i] > 'M' && p[i] <= 'Z') || (p[i] > 'm' && p[i] <= 'z') {
			p[i] -= 13
		}
	}
	return
}

func main() {
	s := strings.NewReader("Lbh penpxrq gur pbqr!")
	r := rot13Reader{s}
	io.Copy(os.Stdout, &r)
}
```
