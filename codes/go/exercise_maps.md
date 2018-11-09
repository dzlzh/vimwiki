# [Go 指南 - 练习：映射](https://tour.go-zh.org/moretypes/23)

## 练习：映射

实现 `WordCount` 。它应当返回一个映射，其中包含每个字符串 `s` 中“单词”的个数。函数 `wc.Test` 会对此函数执行一系列测试用例，并输出成功还是失败。

## 提示代码

```go
package main

import (
	"golang.org/x/tour/wc"
)

func WordCount(s string) map[string]int {
	return map[string]int{"x": 1}
}

func main() {
	wc.Test(WordCount)
}
```

## 解答

```go
package main

import (
	"golang.org/x/tour/wc"
	"strings"
)

func WordCount(s string) map[string]int {
	sArray := strings.Fields(s)
	sMap := make(map[string]int)
	for _, v := range sArray {
		sMap[v] = sMap[v] + 1
		// (sMap[v])++
	}
	return sMap
}

func main() {
	wc.Test(WordCount)
}
```
