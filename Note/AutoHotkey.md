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

