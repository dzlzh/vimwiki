# sed

```
sed [options] 'command' file(s)
sed [options] -f scriptfile file(s)
```

- `-e <script>` 以选项中的指定的script来处理输入的文本文件
- `-f <script file>` 以选项中指定的script文件来处理输入的文本文件
- `-n` 仅显示script处理后的结果
- `-i` 直接修改原文件
- `-r` 使用扩展正则表达式
