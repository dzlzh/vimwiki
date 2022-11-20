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
