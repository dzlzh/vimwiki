# JavaScript-console 对象

## console.log()，console.warn()，console.error()，console.info()，console.debug()

`console.log()` 用于在 console 窗口显示普通信息。

`console.warn()` 用于在 console 窗口显示警示信息。

`console.error()` 用于在 console 窗口显示错误信息。

`console.info()` 用于在 console 窗口显示提示类信息。

参数可以是普通字符串、格式字符串

```
console.log("duan");                                //duan
console.log("zhi","lei");                           //zhi lei
console.log("%s","D-ZL");                           //D-ZL
console.log("%cD-ZL","font-size:20px;color:red;");  //D-ZL(red)
```

> %s 字符串
> 
> %d，%i 整数
> 
> %f 浮点数
> 
> %o 对象的链接
> 
> %c CSS 格式字符串

## console.table()

`console.table` 方法可以将复合类型的数据转成表格。

> 复合类型的数据转成表格，必须拥有主键。

```
//主键为数字
var dzl = [ { id: "1", value: "d" },
            { id: "2", value: "z" },
            { id: "3", value: "l" } 
];
console.table(dzl);
//主键为最外层键
var dzl = {
            D: { id: "1", value: "d" },
            Z: { id: "2", value: "z" },
            L: { id: "3", value: "l" }
};
console.table(dzl);
```

## console.dir()，console.assert()

`console.dir()` 对一个对象进行检查。

`console.assert()` 验证某个条件是否为真。

```
// console.dir()用法格式
console.dir(object);
// console.assert()用法格式
console.assert(条件判断，输出信息);
```

## console.time()，console.timeEnd()

`console.time()`，`console.timeEnd()` 用于计算一个操作花的时间。

```
console.time() //表示开始
    //要计算时间的程序
console.End()  //表示结束
```

## console.group()，console.groupend()

`console.group()`，`console.groupend()` 对信息进行分组。在输出大量的信息的时候可以用，可以折叠 / 展开。

```
console.group(分组名称);
    //分组显示的信息
console.groupEnd();
```

## console.clear()

`console.clear()` 对 console 窗口进行清屏。

## 参考链接

[by 阮一峰 console 对象](http://javascript.ruanyifeng.com/tool/console.html#toc7)
[刘哇勇的部落格 Chrome 控制台不完全指南](http://wayou.github.io/2014/09/10/chrome-console-tips-and-tricks/)
