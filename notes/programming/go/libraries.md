# Go 第三方库

## 应用基础与工具 (Application Foundation & Utilities)

- [spf13/viper](https://github.com/spf13/viper): **配置管理** - 用于管理应用的配置，能轻松读取 JSON、YAML、环境变量等多种格式
- [spf13/cobra](https://github.com/spf13/cobra): **命令行构建** - 一个强大的库，用于创建专业的命令行界面 (CLI) 应用
- [dromara/carbon](https://github.com/dromara/carbon): **日期时间处理** - 提供了比标准库更易用的 API 来处理日期和时间
- [spf13/cast](https://github.com/spf13/cast): **类型转换** - 用于在不同数据类型之间进行安全、便捷的转换
- [go-resty/resty](https://github.com/go-resty/resty): **HTTP 客户端** - 功能丰富的 HTTP 客户端，简化了 API 请求、JSON 处理和重试逻辑

## 日志管理 (Logging Management)

- [uber-go/zap](https://github.com/uber-go/zap): **结构化日志** - Uber 出品的高性能结构化日志库，特别适合生产环境
- [natefinch/lumberjack](https://github.com/natefinch/lumberjack): **日志切割 (按大小)** - 业界标准的日志滚动库，当日志文件达到指定大小时进行切割
- [lestrrat-go/file-rotatelogs](https://github.com/lestrrat-go/file-rotatelogs): **日志切割 (按时间)** - 一个强大的日志滚动库，专注于按时间（天/小时）创建和切割日志文件

## Web 框架与网络服务 (Web Frameworks & Network Services)

- [gin-gonic/gin](https://github.com/gin-gonic/gin): **Web 框架** - 一个高性能、API 友好的 Web 框架，是构建 API 服务的热门选择
- [gorilla/websocket](https://github.com/gorilla/websocket): **WebSocket** - Go 社区最流行、最可靠的 WebSocket 实现，用于实现实时双向通信
- [go-playground/validator](https://github.com/go-playground/validator): **数据校验** - 基于结构体标签 (struct tags) 的强大数据校验器，常用于校验请求参数
- [golang-jwt/jwt](https://github.com/golang-jwt/jwt): **JWT 认证** - 用于生成和解析 JSON Web Tokens (JWT)，是 API 认证的标准方案

## 数据库与存储 (Databases & Storage)

- [go-gorm/gorm](https://github.com/go-gorm/gorm): **ORM 框架** - 功能最全面的 ORM (对象关系映射) 库，极大简化了与 SQL 数据库的交互
- [jmoiron/sqlx](https://github.com/jmoiron/sqlx): **SQL 扩展** - 作为标准库 database/sql 的超集，让你在编写原生 SQL 时更加高效
- [go-redis/redis](https://github.com/go-redis/redis): **Redis 客户端** - Go 社区与 Redis 交互的事实标准客户端

## 任务调度与队列 (Task Scheduling & Queues)

- [hibiken/asynq](https://github.com/hibiken/asynq): **异步任务队列** - 基于 Redis 的可靠、高效的分布式异步任务队列，用于处理耗时操作
- [robfig/cron](https://github.com/robfig/cron): **定时任务** - 一个纯 Go 实现的 Cron 库，用于在应用内执行周期性任务

## 测试与架构 (Testing & Architecture)

- [stretchr/testify](https://github.com/stretchr/testify): **测试工具包** - 提供了比标准库更强大的断言和 Mock 功能，让测试代码更简洁
- [google/wire](https://github.com/google/wire): **依赖注入** - Google 开发的编译期依赖注入工具，用于管理复杂项目中的组件依赖关系
