# Go 项目目录到底该怎么组织？官方指南终于讲清楚了

Go 项目目录该怎么组织，长期以来都没有一个唯一答案。

很多团队会从社区模板开始：`cmd/`、`pkg/`、`internal/`、`api/`、`configs/`、`deployments/` 一把梭。目录看起来很完整，但项目刚启动时，真正有代码的可能只有 `main.go` 和几个业务文件。结果是结构先复杂起来，代码反而被迫去适应目录。

Go 官方文档《Organizing a Go module》给出的思路要克制得多：不要先套模板，而是先判断项目类型，再决定目录结构。Tony Bai 的文章《Go项目目录该怎么组织？官方终于出指南了！》则对这份官方指南做了中文语境下的解读，并补充了社区实践中经常争论的 `pkg/` 目录问题。

把两篇内容放在一起看，结论其实很清楚：Go 项目布局的核心不是“目录越全越专业”，而是“按需组织，保持简单，明确哪些代码是公开 API，哪些代码只是内部实现”。

## 先问项目类型，而不是先建目录

Go 官方指南没有给出一个万能项目模板，而是按项目类型讨论布局方式。这个出发点非常重要。

一个只有一个包的库项目，和一个服务端项目，不应该长得一样。一个只有一个命令的 CLI 工具，和一个同时包含多个命令、多个可导入包的模块，也不应该套同一套目录。

更合理的判断顺序是：

1. 这是库项目，还是可执行程序？
2. 是否只有一个包或一个命令？
3. 是否需要对外暴露可导入的 Go 包？
4. 是否有多个命令入口？
5. 是否存在不希望外部依赖的内部实现？
6. 是否是服务端项目？

目录结构应该是这些问题的结果，而不是项目创建时的默认装饰。

## 简单库项目：源码可以直接放根目录

如果一个模块只是提供一个简单的库包，官方建议非常直接：源码放在模块根目录即可。

```text
project-root/
  go.mod
  modname.go
  modname_test.go
```

如果代码多一点，也可以拆成多个文件，但它们仍然属于同一个 package：

```text
project-root/
  go.mod
  modname.go
  auth.go
  auth_test.go
  hash.go
  hash_test.go
```

这种结构下，使用者直接导入模块路径：

```go
import "github.com/example/modname"
```

这说明 Go 并不要求库代码必须放进 `pkg/`、`src/` 或其他包装目录。对于简单库项目，根目录就是最自然的位置。

## 简单命令项目：`main.go` 也可以直接放根目录

如果项目只是一个简单的可执行程序，也可以把 `main.go` 直接放在根目录：

```text
project-root/
  go.mod
  main.go
```

复杂一点时，可以拆成多个文件，但仍然都是 `package main`：

```text
project-root/
  go.mod
  main.go
  auth.go
  hash.go
```

这类项目安装和运行都很直接。对于单一命令、小规模 CLI 工具，不必为了“标准化”强行创建 `cmd/`。

当然，如果你预期项目会演进成多个命令，或者希望入口和实现逻辑从一开始就分离，那么使用 `cmd/` 也可以。但这应该是出于项目需要，而不是机械套模板。

## `internal/`：隐藏实现细节的首选目录

当项目开始变复杂，需要拆出辅助包时，官方优先推荐使用 `internal/`。

```text
project-root/
  go.mod
  main.go
  internal/
    auth/
      auth.go
    hash/
      hash.go
```

`internal/` 是 Go 里有特殊语义的目录。Go 工具链会限制外部模块导入其中的包。也就是说，外部项目不能直接依赖：

```go
import "github.com/example/project/internal/auth"
```

这个机制非常有价值。

它明确告诉使用者：这些包不是公共 API，不承诺兼容性。项目作者可以根据需要自由重构 `internal/` 下的实现，而不用担心破坏外部用户。

所以，只要某些代码只是服务于当前项目运行，并不打算给其他项目复用，优先放进 `internal/`。这比一开始把所有东西都设计成公开包更稳妥。

## 多个公开包：可以放顶层目录

如果一个模块本身就是库，并且需要对外暴露多个包，官方示例倾向于把公开包直接放在模块顶层：

```text
project-root/
  go.mod
  modname.go
  auth/
    auth.go
    token/
      token.go
  hash/
    hash.go
  internal/
    trace/
      trace.go
```

外部使用者可以导入：

```go
import "github.com/example/modname"
import "github.com/example/modname/auth"
import "github.com/example/modname/auth/token"
import "github.com/example/modname/hash"
```

这里的关键不是目录层级，而是 API 边界：

- 顶层的 `auth/`、`hash/` 是公开包。
- `internal/trace/` 是内部实现，外部不能导入。

判断一个包该放哪里，核心问题应该是：这个包是否是你愿意长期维护兼容性的公共 API。

如果答案是“不是”，它就不应该轻易出现在公开路径上。

## 多个命令：使用 `cmd/`

当一个模块中有多个可执行程序时，`cmd/` 是非常常见、清晰且被官方认可的约定。

```text
project-root/
  go.mod
  internal/
    ...
  cmd/
    api-server/
      main.go
    worker/
      main.go
    migrate/
      main.go
```

这样每个命令都有独立入口，安装路径也很清楚：

```bash
go install github.com/example/project/cmd/api-server@latest
go install github.com/example/project/cmd/worker@latest
```

需要注意的是，`cmd/<name>/main.go` 最好保持很薄。它通常只负责：

- 解析命令行参数或环境变量；
- 初始化配置、日志和依赖；
- 调用内部应用逻辑；
- 处理错误和退出码。

真正的业务实现不应该堆在 `main.go` 里，而应该放进 `internal/` 或明确的公开包中。

## 服务端项目：优先 `cmd/ + internal/`

对于服务端项目，官方指南给出的方向更明确：服务端通常是自包含二进制，不一定需要对外暴露 Go 包。因此，入口放在 `cmd/`，实现放在 `internal/`，通常是最合适的起点。

典型结构如下：

```text
project-root/
  go.mod
  cmd/
    api-server/
      main.go
    worker/
      main.go
  internal/
    app/
    config/
    handler/
    service/
    store/
```

这种结构有几个好处。

第一，命令入口清晰。`api-server`、`worker`、`migrate` 等进程可以各自有独立的 `main.go`。

第二，实现默认私有。业务代码放在 `internal/` 下，不会意外变成外部依赖。

第三，后续演进空间足够。项目变复杂时，可以在 `internal/` 下继续按业务领域、技术层或架构风格拆分。

如果将来某些能力确实需要跨项目复用，更合理的做法通常是把它提炼成独立模块，而不是一开始就在主服务仓库里暴露一堆公共包。

## `pkg/` 到底该不该用？

`pkg/` 是 Go 社区长期争论最多的目录之一。

官方指南没有把 `pkg/` 作为核心推荐目录。它的示例中，公开包通常直接放在模块顶层，而内部实现放在 `internal/`。

Tony Bai 的文章对此做了一个实践层面的补充：如果一个库项目有大量对外公开包，全部放在顶层可能导致根目录显得臃肿。此时，可以考虑用 `pkg/` 统一收纳公开包。

例如：

```text
project-root/
  go.mod
  pkg/
    auth/
      auth.go
    hash/
      hash.go
  internal/
    trace/
      trace.go
```

这种做法不是错，但要明确它的边界。

`pkg/` 适合收纳公开包，而不是所有业务代码。没有公开 API 的服务端项目，不应该默认创建 `pkg/`。否则很容易把本来应该私有的实现路径暴露出去，形成不必要的兼容性负担。

可以用一句话概括：

> 有大量公开包时，可以考虑 `pkg/`；没有公开 API 时，不要为了模板完整而创建 `pkg/`。

## 基础布局不等于业务架构

还有一个常见误区：把 Go 项目基础布局和业务架构分层混在一起讨论。

`cmd/`、`internal/`、`pkg/` 解决的是 Go module、package、command、visibility 的组织问题。

而 `domain/`、`application/`、`infrastructure/`、`adapter/`、`repository/`、`usecase/` 这类目录，解决的是业务建模和架构分层问题。

它们不是同一层面的东西。

一个服务端项目可以在 `internal/` 下继续采用 Clean Architecture 或六边形架构：

```text
project-root/
  cmd/
    api-server/
      main.go
  internal/
    domain/
    application/
    infrastructure/
```

但这应该来自真实的业务复杂度，而不是项目一开始就强行引入。否则，目录越多，开发者越需要猜测代码应该放在哪里，维护成本反而上升。

## 一张简单决策表

| 项目类型 | 推荐结构 |
| --- | --- |
| 简单库 | 源码直接放根目录 |
| 简单命令 | `main.go` 直接放根目录 |
| 命令带内部逻辑 | 根入口或 `cmd/` + `internal/` |
| 多个命令 | `cmd/<command>/main.go` |
| 服务端项目 | `cmd/` + `internal/` |
| 多个公开包 | 顶层包目录 |
| 大量公开包 | 可考虑 `pkg/` |
| 不希望外部依赖的代码 | `internal/` |

## 新项目应该怎么起步？

如果是一个新的 Server/CLI 项目，我建议从这个结构开始：

```text
project-root/
  go.mod
  cmd/
    app-name/
      main.go
  internal/
    app/
      app.go
```

其中，`main.go` 保持薄，只做启动流程：

```go
package main

func main() {
    // parse config, initialize dependencies, call internal app
}
```

核心逻辑先放在 `internal/app` 或其他 `internal/` 子包中。等项目复杂度真实出现，再引入更细的分层。

不要一开始就创建一堆空目录。空目录不会让项目更清晰，反而会制造不必要的选择成本。

## 结语

Go 项目目录组织的关键，不是找到一个最完整的模板，而是把边界想清楚。

简单项目就保持简单。需要隐藏实现细节时使用 `internal/`。有多个命令或服务入口时使用 `cmd/`。确实有公开包时再暴露顶层包或考虑 `pkg/`。至于 DDD、Clean Architecture、六边形架构，那是业务复杂度上来之后的架构选择，不是每个 Go 项目的默认起点。

这也是 Go 一贯的工程哲学：少即是多，按需组织，避免过早抽象。

目录结构应该服务于代码演进，而不是让代码服务于目录模板。

## 参考资料

- [Organizing a Go module - The Go Programming Language](https://go.dev/doc/modules/layout)
- [Go项目目录该怎么组织？官方终于出指南了！ - Tony Bai](https://tonybai.com/2023/10/05/the-official-guide-of-organizing-go-project/)
