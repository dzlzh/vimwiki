# Tmux

### 启动加载指定配置文件

`tmux [-f <conf>]`

- `-f` 加载指定的配置文件

### 新建 Session

`tmux <new|new-session> [-d] [-s <session-name>] [-n <window-name>] [shell-command]`

- `-d` 不打开 tmux 对话

### 判断一个 Session 是否存在

`tmux <has-session|has> [-t <target-session>]`

> 判断指定的 tmux 对话是否存在，如果存在返回码为 0，不存在返回码为 1

### 列出 Session

`tmux ls`

### 恢复 Session

`tmux <a|at|attach|attach-session> [-t <target-session>]`

### 删除 Session

`tmux kill-session -t <target-session>`

### 新建 Windows

`tmux <neww|new-window> [-t <target-window>] [-n <window-name>] [shell-command]`

### 选择一个 Windows

`tmux <selectw|select-window> [-lnp] [-t <target-window>]`

### 新建 Panel

`tmux <splitw|split-window> [-dhvP] [-t <target-pane>]`

- `-h` 水平分割
- `-v` 垂直分割

### 选择一个 Panel

`tmux <selectp|select-pane> [-t <target-pane>]`

### `target-window` 和 `target-panel` 的命名规则

`[session]:[window].[pane]`

- `session:1` 指 session 对话的第一个窗口
- `session:name` 指 session 对话的叫 name 的窗口
- `session:1.0` 指 session 对话的第一个窗口的第 0 个面板。

### 发送命令

`tmux <send-keys|send> [-t <target-pane>] key` 

> `C-m` 回车符

<<<<<<< HEAD
### 设置Tmux Option

`tmux <set-window-option|setw> [-agu] [-t target-window] option value`

### 设置一个布局

`tmux <select-layout|selectl> [-np] [-t target-window] [layout-name]`

- `even-horizontal`
- `even-vertical`
- `main-horizontal`
- `main-vertical`
- `tiled`

## Session

```
# 启动
<prefix>:new [-s <session-name>]

# 列出
<prefix>s

# 退出
<prefix>d

# 重命名
<prefix>$

# 删除
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

## 文本复制模式

```
# 进入复制模式
<prefix>[

# 复制
# <space>进行复制
# <enter>复制完成

# 粘贴
<prefix>]
```

## 命令

```
# 同步窗口
:setw synchronize-panes

# 交换<num>号和<num>号窗口
:swap-window -s <num> -t <num>

# 交换当前和<num>号窗口
:swap-window -t <num>

# 移动当前窗口到<num>号
:move-window -t <num>

# 加载配置文件
:source-file <conf>

# 把窗口变为面板
join-pane <-s [window.pane]|-t [session_name]:[window].[pane]>
```

## 配置

```
# 固定 Window 名称
set-option -g allow-rename off
```

## 状态栏变量

| 变量               | 描述                          |
| :-:                | :-:                           |
| `#H`               | 本地主机的主机名              |
| `#h`               | 本地主机的主机名，没有 domain |
| `#F`               | 当前窗口的标签                |
| `#I`               | 当前窗口的索引                |
| `#P`               | 当前面板的索引                |
| `#S`               | 当前会话的名称                |
| `#T`               | 当前窗口的标题                |
| `#W`               | 当前窗口的名称                |
| `##`               | 一个 # 符号                   |
| `#(shell-command)` | shell 命令的第一行输出        |
| `#[attributes]`    | 要改变的颜色或属性            |
