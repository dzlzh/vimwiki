# protobuf

## 推荐风格

- 文件 (Files)
    - 文件名使用小写下划线的命名风格
    - 每行不超过 80 字符
    - 使用 2 个空格缩进
- 包 (Packages)
    - 包名应该和目录结构对应
- 消息和字段 (Messages & Fields)
    - 消息名使用首字母大写驼峰风格
    - 字段名使用小写下划线的风格
    - 枚举类型，枚举名使用首字母大写驼峰风格，枚举值使用全大写下划线隔开的风格
- 服务 (Services)
    - RPC 服务名和方法名，均使用首字母大写驼峰风格

## 标量类型

| proto           | go      | 备注                          |
| :-:             | :-:     |                               |
| bytes           | []byte  | 任意字节序列，长度不超过 2^32 |
| string          | string  | UTF8 编码，长度不超过 2^32    |
| bool            | bool    |                               |
| int32           | int32   |                               |
| uint32          | uint32  |                               |
| sint32          | int32   | 适合负数                      |
| fixed32         | uint32  | 固长编码，适合大于 2^28 的值  |
| sfixed32        | int32   | 固长编码                      |
| int64           | int64   |                               |
| uint64          | uint64  |                               |
| sint64          | int64   | 适合负数                      |
| fixed64         | uint64  | 固长编码，适合大于 2^56 的值  |
| sfixed64        | int64   | 固长编码                      |
| float           | float32 |                               |
| double          | float64 |                               |
| map<type, type> | map     |                               |
