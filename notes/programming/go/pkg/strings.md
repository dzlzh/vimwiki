# strings

## 前缀与后缀

- `HasPrefix` 判断字符串 `str` 是否以 `prefix` 开头

```
strings.HasPrefix(str, prefix string) bool
```

- `HasSuffix` 判断字符串 `str` 是否以 `suffix` 结尾

```
strings.HasSuffix(str, suffix string) bool
```

## 字符串包含关系

- `Contains` 判断字符串 `str` 是否包含 `substr`

```
strings.Contains(str, substr string) bool
```

## 判断字符串或字符在父字符串中出现的位置（索引）

- `Index` 返回字符串 `str` 在字符串 `s` 中的索引，-1 表示字符串 `s` 不包含字符串 `str`

```
strings.Index(s, str string) int
```

- `LastIndex` 返回字符串 `str` 在字符串 `s` 中最后出现位置的索引，-1 表示字符串 `s` 不包含字符串 `str`

```
strings.LastIndex(s, str string) int
```

- `IndexRune` 如果 `ch `非 ASCII 编码的字符定位

```
strings.IndexRune(s string, r rune) int
```

## 字符串替换

- `Replace` 用于将字符串 `str` 中的前 `n` 个字符串 `old` 替换为字符串 `new`，并返回一个新的字符串，如果 `n = -1` 则替换所有的字符串 `old` 为字符串 `new`

```
strings.Replace(str, old, new, n) string
```

## 统计字符串出现次数

- `Count` 用于计算字符串 `str` 在字符串 `s` 中出现的非重叠次数

```
strings.Count(s, str string) int
```

## 重复字符串

- `Repeat` 用于重复 `count` 次字符串 `s` 并返回一个新的字符串

```
strings.Repeat(s, count int) string
```

## 修改字符串大小写

- `ToLower` 将字符串中的 Unicode 字符全部转换成相应的小写字符
 
```
strings.ToLower(s) string
```

- `ToUpper` 将字符串中的 Unicode 字符全部转换成相应的大写字符

```
strings.ToUpper(s) string
```

## 修剪字符串

- `TrimSpace` 剔除字符串开头和结尾的空白符号

```
strings.TrimSpace(s) string
```

- `Trim` 剔除指定字符

```
strings.Trim(s, str string) string
```

- `TrimLeft` 剔除开头
- `TrimRight` 剔除结尾

## 分割字符串

- `Fields` 利用 1 个或多个空白符号来作为动态长度的分隔符将字符串分割成若干小块，并返回一个 slice，如果字符串只包含空白符号，则返回一个长度为 0 的 slice
 
```
strings.Fields(s) []string
```

- `Split` 自定义分割符号来对指定字符串进行分割

```
strings.Split(s, sep string) []string
```

## 拼接 slice 到字符串

- `Join` 将元素类型为 string 的 slice 使用分割符号来拼接组成一个字符串

```
strings.Join(sl []string, sep string) string
```

## 从字符串中读取内容

- `strings.NewReader(str)` 生成一个 `Reader` 并读取字符串中的内容，然后返回指向该 `Reader` 的指针
- `strings.Read()` 从 `[]byte` 中读取内容
- `strings.ReadByte()` 和 `strings.ReadRune()` 从字符串中读取下一个 byte 或者 rune
