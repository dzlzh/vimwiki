# JavaScript Function

## `arguments`

一个类数组对象。代表传给一个`function`的参数列表。

# JavaScript String 对象

## `str.match()`

字符串内检索指定的值,或找到一个或多个正则表达式的匹配

```javascript
str.match(searchvalue);
str.match(regexp);
```

## `str.split()`

使用指定的分隔符将一个字符串拆分为多个子字符串，并将其以数组形式返回

```javascript
str.split([separator[, limit]]);
```
`str`

> 必选。要拆分的 String 对象或字符串。 split 方法将不修改此对象。

`separator`

> 可选。一个字符串或正则表达式对象，标识用于分隔字符串的一个或多个字符。如果忽略该参数，则将返回包含整个字符串的单元素数组。

`limit`

> 可选。一个用于限制数组中返回的元素数量的值。

## `str.toLowerCase()`

字符串转为小写形式

```javascript
str.toLowerCase();
```

## `str.toUpperCase()`

字符串转为大写形式

```javascript
str.toUpperCase();
```

## `str.replace()`

使用一个替换值（replacement）替换掉一个匹配模式（pattern）在原字符串中某些或所有的匹配项，并返回替换后的新的字符串

```javascript
str.replace(regexp|substr, newSubStr|function);
```

## `str.slice()`

提取字符串的某个部分，并以新的字符串返回被提取的部分

```javascript
str.slice(start,end);
```

## `str.substr()`

返回字符串中从指定位置开始到指定长度的子字符串

```javascript
str.substr(start[, length]);
```

## `str.repeat()`

构造并返回一个重复当前字符串若干次数的新字符串

```javascript
var newStr = str.repeat(count);
```

## `str.indexOf()`

返回指定值在字符串对象中首次出现的位置,从formIndex位置开始查找,如果不存在,则返回-1

```javascript
str.indexOf(searchValue[, formIndex]);
```

## `String.fromCharCode()`

String对象提供的静态方法,根据指定的Unicode编码中的序号值来返回一个字串

```javascript
String.fromCharCode(num1, ..., numN);
```

## `str.charCodeAt()`

返回给定位置字符的Unicode码点,相当与String.fromCharCode()的逆操作

```javascript
str.charCodeAt(index);
```

# JavaScript Math对象

## `Math.random()`

返回介于0~1之间的一个随机数

```javascript
Math.random();
```

## `Math.floor()`

对一个数进行下舍入

```javascript
Math.floor(x);
```

# JSON 对象

## `JSON.parse()`

将 JavaScript 对象表示法 (JSON) 字符串转换为对象

```javascript
JSON.parse(text [, reviver]);
```

`text`

> 必需。 一个有效的 JSON 字符串。

`reviver`

> 可选。 一个转换结果的函数。 将为对象的每个成员调用此函数。 如果成员包含嵌套对象，则先于父对象转换嵌套对象。 对于每个成员，会发生以下情况：
>
> 如果 reviver 返回一个有效值，则成员值将替换为转换后的值。
>
> 如果 reviver 返回它接收的相同值，则不修改成员值。
>
> 如果 reviver 返回 null 或 undefined，则删除了该成员。

## `JSON.stringify()`

将 JavaScript 值转换为 JavaScript 对象表示法 (Json) 字符串

```javascript
JSON.stringify(value [, replacer][, space]);
```

`value`

> 必需。  要转换的 JavaScript 值（通常为对象或数组）。  

`replacer`

> 可选。  用于转换结果的函数或数组。  
>
> 如果 replacer 为函数，则 JSON.stringify 将调用该函数，并传入每个成员的键和值。  使用返回值而不是原始值。  如果此函数返回 undefined，则排除成员。  根对象的键是一个空字符串：""。  
>
> 如果 replacer 是一个数组，则仅转换该数组中具有键值的成员。  成员的转换顺序与键在数组中的顺序一样。  当 value 参数也为数组时，将忽略 replacer 数组。  

`space`

> 可选。  向返回值 JSON 文本添加缩进、空格和换行符以使其更易于读取。  
>
> 如果省略 space，则将生成返回值文本，而没有任何额外空格。
>
> 如果 space 是一个数字，则返回值文本在每个级别缩进指定数目的空格。  
>
> 如果 space 大于 10，则文本缩进 10 个空格。  
>
> 如果 space 是一个非空字符串（例如“\t”），则返回值文本在每个级别中缩进字符串中的字符。
>
> 如果 space 是长度大于 10 个字符的字符串，则使用前 10 个字符。

# JavaScript Array 对象

## `arr.map()`

对数组的每个元素调用定义的回调函数并返回包含结果的数组

```javascript
arr.map(callbackfn[, thisArg]);
```

**回调函数语法**

`function callbackfn(value, index, array1)`

`Value`

> 数组元素的值。

`index`

> 数组元素的数字索引。

`array1`

> 包含该元素的数组对象

## `arr.reduce()`

对数组中的所有元素调用指定的回调函数

```javascript
arr.reduce(callbackfn[, initialValue]);
```

该回调函数的返回值为累积结果，并且此返回值在下一次调用该回调函数时作为参数提供。
**回调函数语法**
`function callbackfn(previousValue, currentValue, currentIndex, arr)`

`previousValue` 

> 通过上一次调用回调函数获得的值。如果向 reduce 方法提供 initialValue，则在首次调用函数时，previousValue 为 initialValue。

`currentValue`

> 当前数组元素的值。

`currentIndex`

> 当前数组元素的数字索引。

`arr`

> 包含该元素的数组对象。

## `arr.filter()`

返回数组中的满足回调函数中指定的条件的元素

```javascript
arr.filter(callbackfn[, thisArg]);
```

**返回值**
一个包含回调函数为其返回 true 的所有值的新数组。如果回调函数为 array1 的所有元素返回 false，则新数组的长度为 0。

**回调函数语法**

> 同map

## `arr.sort()`

对 Array 排序

```javascript
arr.sort(sortFunction);
```

> 如果省略sortFunction则按ACSII字符顺序

> 如果在 sortFunction 参数中提供一个函数，则该函数必须返回下列值之一：
>
> 如果所传递的第一个参数小于第二个参数，则返回负值。
>
> 如果两个参数相等，则返回零。
>
> 如果第一个参数大于第二个参数，则返回正值。

## `arr.reverse()`

反转 Array 中的元素

```javascript
arr.reverse();
```

## `arr.concat()`

组合两个或两个以上的数组

```javascript
arr.concat([item1[, item2[, . . . [, itemN]]]]);
```

## `arr.join()`

添加由指定分隔符字符串分隔的数组的所有元素

```javascript
arr.join([separator]);
```

## `arr.push()`

添加一个或多个元素到数组的末尾，并返回数组新的长度（length 属性值）

```javascript
arr.push(element1, ..., elmentN);
```

## `arr.slice()`

复制数组的一部分到一个新的数组,并返回这个数组

```javascript
arr.slice([begin[, end]]);
```

## `arr.splice()`

用新元素替换旧元素,以此修改数组的内容

```javascript
arr.splice(start, deleteCount[, item1[, item2, ...]]);
```

## `arr.filter()`

使用指定的函数测试所有的元素,并创建一个包含所有通过测试的元素的新数组

```javascript
arr.filter(callback[, thisArr]);
```

**回调函数语法**
`function callback(element, index, array)`

> 返回true表示保留该元素
>
> 返回false则不保留

## `arr.indexOf()`

返回给定元素能找在数组中找到的第一个索引值,否则返回-1

```javascript
arr.indexOf(searchElement[, fromIndex = 0]);
```

## `arr.forEach()`

让数组的每一项都执行一次给定的函数

```javascript
arr.forEach(callback[, thisArg]);
```

`callback`

> 在数组每一项上执行的函数,接收三个参数:
>
> `currentValue`
>
> 当前项（指遍历时正在被处理那个数组项）的值。
>
> `index`
>
> 当前项的索引（或下标）。
>
> `array`
>
> 数组本身。

`thisArg`

> 可选参数。用来当作cakkback函数内this的值的对象。

# JavaScript Object对象

## `Object.keys()`

返回一个由给定对象的所有可枚举自身属性的属性名组成的数组，数组中属性名的排列顺序和使用`for-in`循环遍历该对象时返回的顺序一致（两者的主要区别是for-in`还会遍历出一个对象从其原型链上继承到的可枚举属性）。

```javascript
Object.keys(obj);
```

