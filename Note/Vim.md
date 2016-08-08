# Vim

## 删除空行

`:g/^$/d`

> `:[range]g[lobal]/{pattern}/[cmd]`
>
> 在`[range]`界定的匹配模式`{pattern}`的文本行上执行Ex命令`[cmd]`
>
> `:[range]g[lobal]!/{pattern}/[cmd]`
>
> 在`[range]`界定的不匹配模式`{pattern}`的文本行上执行Ex命令`[cmd]`
>
> `:[range]v[lobal]/{pattern}/[cmd]`
>
> 等同于 `:g!`

