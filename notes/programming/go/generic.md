# 泛型

```go
func f[T any](a T) T

```

## 类型约束

```go
any // 任意
comparable // 可比较
constraints 包
```

```go
// 类型列表
type able interface {
    int | int8 | int16 | int32 | int64 | uint | uint8 | uint16 | uint32 | uint64 | uintptr | float32 | float64 | complex64 | complex128 | string
}
```

`|`
`~` 所有衍生类型
