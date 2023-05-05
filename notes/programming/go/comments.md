# GO 注释

## `go:build`

根据条件编译源码

```go
//go:build <build constraint>
// go build  -tags "tags"
```

## `go:embed`

编译时把静态资源打包

```go
//go:embed <pattern>
// 三种变量类型 string []byte embed.FS
//go:embed string
var s string
//go:embed bytes
var b []byte

//go:embed fs
var fs embed.FS
// Open 打开要读取的文件，并返回文件的 fs.File 结构。
func (f FS) Open(name string) (fs.File, error)
// ReadDir 读取并返回整个命名目录
func (f FS) ReadDir(name string) ([]fs.DirEntry, error)
// ReadFile 读取并返回 name 文件的内容。
func (f FS) ReadFile(name string) ([]byte, error)
```

## `go:generate`

`go generate [-run regexp] [-n] [-v] [-x] [command] [build flags] [file.go... | packages]`

- `-run` 正则表达式匹配命令行，只执行匹配的
- `-v` 输出被处理的包名和源文件名
- `-n` 显示不执行的命令
- `-x` 显示并执行命令

```go
//go:generate <command> <arguments>
```

## `go:cgo`

```go
//go:cgo <directive>

//go:cgo CFLAGS: -g -Wall  编译选项
//go:cgo LDFLAGS: -L. -lfoo 链接选项
//go:cgo pkg-config: --cflags --libs zlib 链接的库文件
//go:cgo_import_dynamic puts puts 导入的函数
import "C"
```

## 其它

```go
//go:linkname local remote
//go:noinline
//go:nosplit
//go:noescape
//go:norace
```
