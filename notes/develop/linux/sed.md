# sed

```
sed [options] 'command' file(s)
sed [options] -f scriptfile file(s)
```
## options

- `-e <script>` 以选项中的指定的script来处理输入的文本文件
- `-f <script file>` 以选项中指定的script文件来处理输入的文本文件
- `-n` 仅显示script处理后的结果
- `-i` 直接修改原文件，建议使用 `-i.bak` 做好备份
- `-r` 使用扩展正则表达式

## command
 
多个命令可使用 `{}` 打包命令，可使用 `;` 分隔命令
`!` 指定范围不执行

- `p` 打印匹配内容
- `d` 删除匹配内容
- `w` 把匹配内容写到其它地方
- `s` 匹配替换
- `a` 追加行
- `i` 插入行
- `c` 替换匹配行
- `N` 下一行内容当做当前缓存区内容处理
- `g` 将 hold space 中的内容拷贝到 pattern space 中，原来 pattern space 里的内容清除
- `G` 将 hold space 中的内容 append 到 pattern space\n 后
- `h` 将 pattern space 中的内容拷贝到 hold space 中，原来的 hold space 里的内容被清除
- `H` 将 pattern space 中的内容 append 到 hold space\n 后
- `x` 交换 pattern space 和 hold space 的内容

### s 匹配替换

```
sed [options] '[range] s/regexp/replacement/flag' file(s)
```

替换分隔符 `|^@!/`

`&` 表示查长到的内容

#### flag

- `g` 全文替换
- `p` 仅输出匹配行内容
- `w` 仅输出有变换的行
- `i` 忽略大小写。
- `e` 输出的每一行，执行一个命令
