# 技巧

```go
// 编译时断言是否实现接口
var _ io.ReadCloser = (*A)(nil)
```
