# Go 命令

## `go run`

编译并运行 go 语言程序

## `go install`

编译并安装指定的代码包及它们的依赖包

## `go fmt`

格式化代码文件

## `go build`

测试编译

在包的编译过程中，在必要情况下，还可以同时编译与之关联的包。

- 普通包：执行完 `go build`，不会产生任何文件

- main 包：执行完 `go build`，会在当前目录下生成一个可执行文件

### `-tags`

构建约束，也称为构建标记，是以一行注释开头的

```
// +build
```

```
// +build linux,386 darwin,!cgo
(linux AND 386) OR (darwin AND (NOT cgo))

// +build linux darwin
// +build 386
(linux OR darwin) AND 386

// +build ignore
```

### `-ldflags`

- `-w` 去掉 DWARF 调试信息，得到的程序就不能用 gdb 调试了
- `-s` 去掉符号表，panic 时候的 stack trace 就没有任何文件名 / 行号信息了，这个等价于普通 C/C++ 程序被 strip 的效果
- `-X` 设置包中的变量值

## `go clean`

用来移除当前源码包里编译生成的文件

## `go get`

动态获取远程代码

## `go test`

执行这个命令会自动读取源码目录下名为 `*_test.go` 文件，生成并运行测试用的可执行文件。

- `-v` 打印每个测试函数的名字和运行时间
- `-run` 正则表达式，只有测试函数名被它正确匹配的测试函数才会被 go test 测试命令运行

## `go env`

查看当前 go 的环境变量

## `go list`

列出当前全部安装的 `package`

## GOOS GOARCH

| GOOS      | GOARCH   |
| :-:       | :-:      |
| aix       | ppc64    |
| android   | 386      |
| android   | amd64    |
| android   | arm      |
| android   | arm64    |
| darwin    | amd64    |
| darwin    | arm64    |
| dragonfly | amd64    |
| freebsd   | 386      |
| freebsd   | amd64    |
| freebsd   | arm      |
| illumos   | amd64    |
| ios       | arm64    |
| js        | wasm     |
| linux     | 386      |
| linux     | amd64    |
| linux     | arm      |
| linux     | arm64    |
| linux     | loong64  |
| linux     | mips     |
| linux     | mipsle   |
| linux     | mips64   |
| linux     | mips64le |
| linux     | ppc64    |
| linux     | ppc64le  |
| linux     | riscv64  |
| linux     | s390x    |
| netbsd    | 386      |
| netbsd    | amd64    |
| netbsd    | arm      |
| openbsd   | 386      |
| openbsd   | amd64    |
| openbsd   | arm      |
| openbsd   | arm64    |
| plan9     | 386      |
| plan9     | amd64    |
| plan9     | arm      |
| solaris   | amd64    |
| windows   | 386      |
| windows   | amd64    |
| windows   | arm      |
| windows   | arm64    |
