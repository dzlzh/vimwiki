# JavaScript String 对象

```javascript
//字符串内检索指定的值,或找到一个或多个正则表达式的匹配
stringObject.match(searchvalue);
stringObject.match(regexp);
```

# JavaScript Math对象

```javascript
//返回介于0~1之间的一个随机数
Math.random();

//对一个数进行下舍入
Math.floor(x);
```

# JSON 对象

```javascript
//将 JavaScript 对象表示法 (JSON) 字符串转换为对象。
JSON.parse(text [, reviver]);
/*
text
必需。 一个有效的 JSON 字符串。
reviver
可选。 一个转换结果的函数。 将为对象的每个成员调用此函数。 如果成员包含嵌套对象，则先于父对象转换嵌套对象。 对于每个成员，会发生以下情况：
如果 reviver 返回一个有效值，则成员值将替换为转换后的值。
如果 reviver 返回它接收的相同值，则不修改成员值。
如果 reviver 返回 null 或 undefined，则删除了该成员。
*/

//将 JavaScript 值转换为 JavaScript 对象表示法 (Json) 字符串。
JSON.stringify(value [, replacer] [, space]);
/*
value
必需。  要转换的 JavaScript 值（通常为对象或数组）。  
replacer
可选。  用于转换结果的函数或数组。  
如果 replacer 为函数，则 JSON.stringify 将调用该函数，并传入每个成员的键和值。  使用返回值而不是原始值。  如果此函数返回 undefined，则排除成员。  根对象的键是一个空字符串：""。  
如果 replacer 是一个数组，则仅转换该数组中具有键值的成员。  成员的转换顺序与键在数组中的顺序一样。  当 value 参数也为数组时，将忽略 replacer 数组。  
space
可选。  向返回值 JSON 文本添加缩进、空格和换行符以使其更易于读取。  
如果省略 space，则将生成返回值文本，而没有任何额外空格。
如果 space 是一个数字，则返回值文本在每个级别缩进指定数目的空格。  如果 space 大于 10，则文本缩进 10 个空格。  
如果 space 是一个非空字符串（例如“\t”），则返回值文本在每个级别中缩进字符串中的字符。
如果 space 是长度大于 10 个字符的字符串，则使用前 10 个字符。
*/
```

# JavaScript Array 对象

```javascript
//对数组的每个元素调用定义的回调函数并返回包含结果的数组。
array1.map(callbackfn[, thisArg]);
/*
回调函数语法
回调函数的语法如下所示：
function callbackfn(value, index, array1)
你可使用最多三个参数来声明回调函数。
下表列出了回调函数参数。
回调参数  定义
Value    数组元素的值。
index    数组元素的数字索引。
array1   包含该元素的数组对象
*/

//对数组中的所有元素调用指定的回调函数。该回调函数的返回值为累积结果，并且此返回值在下一次调用该回调函数时作为参数提供。
array1.reduce(callbackfn[, initialValue]);
/*
回调函数语法
回调函数的语法如下所示：
function callbackfn(previousValue, currentValue, currentIndex, array1)
可使用最多四个参数来声明回调函数。
下表列出了回调函数参数。

previousValue 
通过上一次调用回调函数获得的值。如果向 reduce 方法提供 initialValue，则在首次调用函数时，previousValue 为 initialValue。

currentValue
当前数组元素的值。

currentIndex
当前数组元素的数字索引。

array1
包含该元素的数组对象。
*/
```

