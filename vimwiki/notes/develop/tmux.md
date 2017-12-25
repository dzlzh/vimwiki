# Tmux

## Session

```
# 启动
tmux [new -s <session-name>]
<prefix>:new [-s <session-name>]

# 列出
tmux ls
<prefix>s

# 退出
<prefix>d

# 恢复
tmux <a|at|attach> [-t <name>]

# 重命名
<prefix>$

# 删除
tmux kill-session -t <session-name>
<prefix>:kill-session

## 删除所有
<prefix>:kill-server
```

## Window

```
# 新建
<prefix>c

# 列出
<prefix>w

# 下一个
<prefix>n

# 上一个
<prefix>p

# 切换到指定 Window
<prefix>[0-9]

# 查找
<prefix>f

# 重命名
<prefix>,

# 关闭
<prefix>&

# 移动当前窗口到<num>号
<prefix>.
```

## Pane

```
# 水平分割
<prefix>%

# 垂直分割
<prefix>"

# 关闭当前分屏
<prefix>x

# 将当前 Pane 置于一个新 Window
<prefix>!

# 显示编号
<prefix>q

# 下一个
<prefix>o

# 最大化
<prefix>z

# 切换布局
<prefix><space>

# 向前置换当前面板
<prefix>{

# 向后置换当前面板
<prefix>}

# 顺时针旋转当前窗口的面板
<prefix>C-o

# 逆时针旋转当前窗口的面板
<prefix>A-o

# 移动到对应 Pane
<prefix>[up|down|left|right]

# 以 1 个单元格为单位移动边缘以调整当前面板大小
<prefix>C-[up|down|left|right]

# 以 5 个单元格为单位移动边缘以调整当前面板大小
<prefix>A-[up|down|left|right]
```

## 命令

```
# 同步窗口
:setw synchronize-panes

# 固定 Window 名称
set-option -g allow-rename off

# 交换<num>号和<num>号窗口
swap-window -s <num> -t <num>

# 交换当前和<num>号窗口
swap-window -t <num>

# 移动当前窗口到<num>号
move-window -t <num>
```
