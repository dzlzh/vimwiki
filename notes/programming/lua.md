# Lua

## 注释

```lua
-- 行注释
--[[
    块注释
]]--
```

## 变量

```lua
-- 变量是全局变量
-- 前加 local 关键字是局部变量

-- 数字
num = 1024 -- double 型 64bits

-- 字符串
str = '单引号'
str = "双引号"
str = [[
两个方括号
]]

-- 空 nil
v = UndefinedVariable
v = anUnknownVariable

-- 布尔类型只有 nil 和 false 是 false，数字 0 啊，‘’空字符串（’\0’）都是 true！
```

## 控制语句

```lua
-- while 循环
while num < 50 do
    num = num + 1
end

-- if-else 分支
if num > 40 then
    local line = io.read() -- 读取标准输入
elseif num ~= 10 and num > 5 then
    -- ~= 不等于
    -- == 相等于
    -- and or not
    io.write('默认标准输出')
else
    print("age"..15)
    -- .. 字符串拼接
end

-- or 和 and 短路
ans = false and 'yes' or 'no'  --> 'no'

-- for 循环
-- 通常，范围表达式为 begin, end[, step]
for i = 1, 100 do
    sum = sum + i
end
for i = 1, 100, 2 do
    sum = sum + i
end
for i = 100, 1, -2 do
    sum = sum + i
end

-- until 循环
repeat
    sum = sum ^ 2
until sum > 1000
```

## 函数

```lua
-- 局部函数前加 local
-- fu(...) 可变参数

-- 递归
function fib(n)
    if n < 2 then return 1 end
    return fib(n - 2) + fib(n - 1)
end

-- 闭包
function C()
    local i = 0
    return function()
        i = i + 1
        return i
    end
end
c = C()
print(c()) --> 1
print(c()) --> 2
function Power(x)
    -- 记住 x 的值
    return function(y) return y^x end
end
p2 = Power(2)
p3 = Power(3)
print(p2(4)) -- 4 的 2 次方
print(p3(5)) -- 5 的 3 次方
```

## Table

```lua
-- _G 所有的全局变量都在这个特殊的 Table 中

table = {key=value}
print(table.key)

-- 数组
-- 下标从 1 开始
arr = {value}
print(arr[1])
print(#arr) -- 长度

-- 遍历
for k, v in pairs(t) do
    print(k,v)
end
```

## MateTable 和 MetaMethod

```lua
fraction_a = {numerator=2, denominator=3}
fraction_b = {numerator=4, denominator=7}
fraction_op={}
function fraction_op.__add(f1, f2)
    ret = {}
    ret.numerator = f1.numerator * f2.denominator + f2.numerator * f1.denominator
    ret.denominator = f1.denominator * f2.denominator
    return ret
end
setmetatable(fraction_a, fraction_op)
setmetatable(fraction_b, fraction_op)
fraction_s = fraction_a + fraction_b

--[[
__add(a, b)         对应表达式 a + b
__sub(a, b)         对应表达式 a - b
__mul(a, b)         对应表达式 a * b
__div(a, b)         对应表达式 a / b
__mod(a, b)         对应表达式 a % b
__pow(a, b)         对应表达式 a ^ b
__unm(a)            对应表达式 -a
__concat(a, b)      对应表达式 a .. b
__len(a)            对应表达式 #a
__eq(a, b)          对应表达式 a == b
__lt(a, b)          对应表达式 a < b
__le(a, b)          对应表达式 a <= b
__index(a, b)       对应表达式 a.b
__newindex(a, b, c) 对应表达式 a.b = c
__call(a, ...)      对应表达式 a(...)
]]--
```

## 面向对象

```lua
-- 类
Dog = {}
function Dog:new()
    local newObj = {sound = 'woof'}
    self.__index = self
    return setmetatable(newObj, self) -- 返回第一个参数
end
function Dog:makeSound()
    print('i say ' .. self.sound)
end
mrDog = Dog:new()
mrDog:makeSound()

-- 继承
LoudDog = Dog:new()
function LoudDog:makeSound()
    local s = self.sound .. ' '
    print(s .. s .. s)
end
seymour = LoudDog:new()
seymour:makeSound()
```

## 模块

```lua
-- 只执行一次
require("model_name")
m = require("model_name")
local m = (function ()
  -- model_name.lua 文件的内容
end)()

-- 每次执行
dofile("model_name")
m = dofile("model_name")

-- 载入不执行，需要的时候手动执行
m = loadfile("model_name")
m()
```
