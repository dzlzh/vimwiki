# sync/atomic

## 原子操作

- 加法（add）
- 比较并交换（compare and swap，简称 CAS）
- 加载（load）
- 存储（store）
- 交换（swap）

## 数据类型

- `int32`
- `int64`
- `uint32`
- `uint64`
- `uintptr`
- `unsafe.Pointer` （未提供进行原子加法操作的函数）
- `Value` （可存储任意类型的值）
