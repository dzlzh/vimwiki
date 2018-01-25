# Vim - 基本操作

## window

```
:sp[lit] {file}     " 水平分屏
:new {file}         " 水平分屏
:sv[iew] {file}     " 水平分屏，以只读方式打开
:vs[plit] {file}    " 垂直分屏
:clo[se]            " 关闭当前窗口

Ctrl+w s            " 水平分割当前窗口
Ctrl+w v            " 垂直分割当前窗口
Ctrl+w q            " 关闭当前窗口
Ctrl+w n            " 打开一个新窗口（空文件）
Ctrl+w o            " 关闭出当前窗口之外的所有窗口
Ctrl+w T            " 当前窗口移动到新标签页

Ctrl+w =            " 统一窗口高度
Ctrl+w -            " 减小窗口高度
Ctrl+w +            " 增加窗口高度
Ctrl+w <            " 减小窗口宽度
Ctrl+w >            " 增加窗口宽度
```

## tab

```
:tabnew     " 增加一个标签
:tabc       " 关闭当前的tab
:tabo       " 关闭所有其他的tab
:tabs       " 查看所有打开的tab
:tabp       " 前一个
:tabn       " 后一个
gT          " 前一个
gt          " 后一个
```

## buffers

```
:ls                     " 列出所有缓冲区
:buffers                " 列出所有缓冲区
:bn[ext]                " 下一个缓冲区
:bp[revious]            " 上一个缓冲区
:b {number, expression} " 跳转到指定缓冲区
:bd {number}            " 删除缓冲区
```

## 文件对比

```
:vert[ical] diffs[plit] {filename} "文件对比
[c          " 跳转到上一处差异文件的位置
]c          " 跳转到下一处差异文件的位置
dp          " 将当前窗口光标位置处的内容复制到另一窗口
do          " 将另一窗口光标位置处的内容复制到当前窗口
diffupdate  " 重新比较两个文件，如果手动修改文件的话有时不会自动同步
```

## 快速回跳

```
``  "当前文件上次跳转操作的位置
`.  "上次修改操作的地方
`^  "上次插入的地方
`[  "上次修改或复制的起始位置
`]  "上次修改或复制的结束位置
`<  "上次高亮选区的起始位置
`>  "上次高亮选区的结束位置
```

## 文件操作

```
%  " 当前文件路径
:p " path
:h " head
:t " tail
```

## 基本计算器

在插入模式下，你可以使用 `Ctrl + r` 键然后输出 `=`，再输入一个简单的算式。按 `Enter` 键，计算结果会插入到文件中。

## 加和减

```
ctrl+a //加1
ctrl+x //减1
```