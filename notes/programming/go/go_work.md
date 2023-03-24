# go work

## 命令

`go work`

- `init` 初始化一个工作区
- `use [-r]` 将 Go Module 添加到 `go.work` 中，`-r` 递归
- `edit` 编辑 `go.work` 文件
- `sync` 把 `go.work` 文件里的依赖同步到 workspace 包含的 Module 的 `go.mod` 文件中

## go.work

- `go` 版本
- `use`
- `replace` 替换 Go Module
