# strconv

字符串与其它类型的转换

- `strconv.IntSize` 获取程序运行平台下 int 类型所占的位数
- `strconv.Itoa(i int) string` 返回数字 i 所表示的字符串类型的十进制数
- `strconv.FormatFloat(f float64, fmt byte, prec int, bitSize int) string` 将 64 位浮点型的数字转换为字符串，其中 `fmt` 表示格式（其值可以是 `b`、`e`、`f` 或 `g`），`prec` 表示精度，`bitSize` 则使用 32 表示 float32，用 64 表示 float64
- `strconv.Atoi(s string) (i int, err error)` 将字符串转为 int 型
- `strconv.ParseFloat(s string, bitSize int) (f float64, err error)` 将字符串转换为 float64

