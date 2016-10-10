# AutoHotkey

## Hotkeys & Hotstrings

热键是通过一对`::`创建的

按键名或组合按键名必须在`::`**左边**

```ahk
^j::
    Send, My First Script
Return
```

热字串在要触发的文本两边各有一对`::`

替换后的文本在第二对`::`**右边**

```ahk
::test::
    This is test
Return
```

### 键和神秘符号

|  符号   |            描述             |
| :---: | :-----------------------: |
| **#** |     Win(Windows 徽标键)      |
| **!** |            Alt            |
| **^** |          Control          |
| **+** |           Shift           |
| **&** | 用于连接两个按键（含鼠标按键）合并成一个自定义热键 |

### 窗口特殊热键 / 热字串

热键或热字串只在某些特定窗口上工作（或禁用）。使用 **#** 指令。

**#IfWinActive**

**#IfWinExist**

