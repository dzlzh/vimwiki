# .bashrc

## 提示符

```
提示符(PROMPTING)
    在 交互执行时， bash 在准备好读入一条命令时显示主提示符 PS1，在需要更多的输入来完成一条命令时显示 PS2。 Bash 允许通过插入一些反斜杠转义的特
    殊字符来定制这些提示字符串，这些字符被如下解释：
        \a     一个 ASCII 响铃字符 (07)
        \d     日期，格式是 "星期 月份 日" (例如，"Tue May 26")
        \D{format}
               format 被传递给 strftime(3)，结果被插入到提示字符串中；空的 format 将使用语言环境特定的时间格式。花括号是必需的
        \e     一个 ASCII 转义字符 (033)
        \h     主机名，第一个 ‘.’ 之前的部分
        \H     主机名
        \j     shell 当前管理的作业数量
        \l     shell 的终端设备名的基本部分
        \n     新行符
        \r     回车
        \s     shell 的名称， $0 的基本部分 (最后一个斜杠后面的部分)
        \t     当前时间，采用 24小时制的 HH:MM:SS 格式
        \T     当前时间，采用 12小时制的 HH:MM:SS 格式
        \@     当前时间，采用 12小时制上午/下午 (am/pm) 格式
        \A     当前时间，采用 24小时制上午/下午格式
        \u     当前用户的用户名 the username of the current user
        \v     bash 的版本 (例如，2.00)
        \V     bash 的发行编号，版本号加补丁级别 (例如，2.00.0)
        \w     当前工作目录
        \W     当前工作目录的基本部分
        \!     此命令的历史编号
        \*     此命令的命令编号
        \$     如果有效 UID 是 0，就是 #， 其他情况下是 $
        \nnn   对应八进制数 nnn 的字符
        \\     一个反斜杠
        \[     一个不可打印字符序列的开始，可以用于在提示符中嵌入终端控制序列
        \]     一个不可打印字符序列的结束

    命令编号和历史编号通常是不同的：历史编号是命令在历史列表中的位置，可能包含从历史文件中恢复的命令 (参见下面的 HISTORY 历史章节)，而命令编 号
    是 当 前 shell 会话中执行的命令序列中，命令的位置。字符串被解码之后，它将进行扩展，要经过 parameter expansion， command substitution， arith‐
    metic expansion 和 quote removal， 最后要经过 shell 选项 promptvars 处理 (参见下面的 shell 内建命令(SHELL BUILTIN COMMANDS) 章节中，对 命 令
    shopt 的描述)。
```

| 前景 | 背景 | 颜色   |
|------|------|--------|
| 30   | 40   | 黑色   |
| 31   | 41   | 紅色   |
| 32   | 42   | 綠色   |
| 33   | 43   | 黃色   |
| 34   | 44   | 藍色   |
| 35   | 45   | 紫紅色 |
| 36   | 46   | 青藍色 |
| 37   | 47   | 白色   |

| 代码 | 意义      |
|------|-----------|
| 0    | OFF       |
| 1    | 高亮显示  |
| 4    | underline |
| 5    | 闪烁      |
| 7    | 反白显示  |
| 8    | 不可见    |