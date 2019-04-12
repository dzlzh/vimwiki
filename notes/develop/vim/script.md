# VimScript

## 变量

### 定义与删除

- `let`    初始化或赋值变量
- `unlet`  删除变量
- `unlet!` 删除变量，忽视不存在错误

### 作用域

- `g:var` 全局
- `a:var` 函数参数
- `l:var` 函数局部变量
- `b:var` buffer 局部变量
- `w:var` window 局部变量
- `t:var` tab 局部变量
- `s:var` 当前脚本内可见的局部变量
- `v:var` Vim 预定义的内部变量

## 数据类型

- `Number`     32 位有符号整数
- `Float`      浮点数，需要编译 Vim 的时候，有 +float 特性支持
- `String`     NULL 结尾的 8 位无符号字符串
- `Funcref`    函数引用，函数引用类型的变量名必须以大写字母开头
- `List`       有序列表
- `Dictionary` 无序的 Key/Value 容器
- `Boolean`     Vim8.1 中包含 `v:true`/`v:false`

## 字符串操作

- `<string> == <string>`  字符串相等
- `<string> != <string>`  字符串不等
- `<string> =~ <pattern>` 匹配 pattern
- `<string> !~ <pattern>` 不匹配 pattern
- `<operator>#`           匹配大小写
- `<operator>?`           不匹配大小写
- `<string> . <string>`   字符串连接

## 控制语句

### 条件判断语句

```vim
if <expression>
   " code
elseif <expression>
   " code
else
   " code
endif
```

### 循环执行语句

```vim
for <var> in <list>
    " code
endfor

while <expression>
    " code
endwhile
```

### 转向语句

```vim
continue
break
```

## 异常捕获

```vim
try
    " code
catch <pattern (optional)>
    " HIGHLY recommended to catch specific error.
finally
    " code
endtry
```

## 函数

```vim
" 创建
function! <Name>(arg1, arg2, ...)
    " code
endfunction

" 创建只执行一次
function! <Name>(arg1, arg2, ...) range
    " code
endfunction

" 删除
delfunction <function>

" 调用
call <function>
```

> 创建时使用关键字 `function!`

> 函数名称首字母大写

> `...` 不定长参数形式

> `range` 只会执行一次

## 面向对象

原生不支持，可使用字典模拟。

```vim
let Class = {"className" : "Class"}
function Class.print() dict
    echo self.className
endfunction
```

> `dict` 关键字把字典暴露为 `self` 关键字
