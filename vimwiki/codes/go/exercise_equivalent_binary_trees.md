# [练习：等价二叉查找树](https://tour.go-zh.org/concurrency/7)

## 练习：等价二叉查找树

不同二叉树的叶节点上可以保存相同的值序列。例如，以下两个二叉树都保存了序列 `1，1，2，3，5，8，13` 。

![](https://tour.go-zh.org/content/img/tree.png)

在大多数语言中，检查两个二叉树是否保存了相同序列的函数都相当复杂。 我们将使用 Go 的并发和信道来编写一个简单的解法。

本例使用了 `tree` 包，它定义了类型：

```go
type Tree struct {
    Left  *Tree
    Value int
    Right *Tree
}
```

1. 实现 `Walk` 函数。

2. 测试 `Walk` 函数。

函数 `tree.New(k)` 用于构造一个随机结构的已排序二叉查找树，它保存了值 `k 、 2k 、 3k ... 10k`。

创建一个新的信道 `ch` 并且对其进行步进：

```go
go Walk(tree.New(1), ch)
```

然后从信道中读取并打印 10 个值。应当是数字 `1, 2, 3, ..., 10` 。

3. 用 `Walk` 实现 `Same` 函数来检测 `t1` 和 `t2` 是否存储了相同的值。

4. 测试 `Same` 函数。

`Same(tree.New(1), tree.New(1))` 应当返回 `true` ，而 `Same(tree.New(1), tree.New(2))` 应当返回 `false`。

## 提示代码

```go
package main

import "golang.org/x/tour/tree"

// Walk 步进 tree t 将所有的值从 tree 发送到 channel ch。
func Walk(t *tree.Tree, ch chan int)

// Same 检测树 t1 和 t2 是否含有相同的值。
func Same(t1, t2 *tree.Tree) bool

func main() {
}
```

## 解答

```go
```
