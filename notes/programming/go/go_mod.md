# go mod

## 使用

设置 `GO111MODULE`

- `off` 不使用
- `on`  使用，不用去 GOPATH 目录下查找
- `auto` 默认根据当前目录来决定

## 命令

`go mod`

- `download` 下载依赖
- `edit` 编辑go.mod文件
- `graph` 打印模块依赖图
- `int` 初始化
- `tidy` 拉取缺少的模块，移除不用的模块
- `vendor` 将依赖复制到 vendor
- `verify` 验证依赖是否正确
- `why` 为什么需求依赖

## `go.mod`

- `module` 语句指定包的名字（路径）
- `require` 语句指定的依赖项模块
- `replace` 语句可以替换依赖项模块
- `exclude` 语句可以忽略依赖项模块

## `go list`

- `go list -m all` 显示所有的 package `-json` JSON 格式显示
- `go list -m -u all` 检查可以升级的 package
- `go get -u need-upgrade-package` 升级后会将新的依赖版本更新到 go.mod

## `go get`

- `go get -u <package>` 升级到最新的次要版本或者修订版本 
- `go get -u=patch <package>` 将会升级到最新的修订版本
- `go get package@version` 将会升级到指定的版本号 version
- `go get` 有版本的更改，那么 go.mod 文件也会更改
