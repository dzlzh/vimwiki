# JavaScript

## Function

### `arguments`

一个类数组对象。代表传给一个`function`的参数列表。

### `parseInt()`

将给定的字符串以指定基数（radix/base）解析成为整数。

```javascript
parseInt(string, radix);
```

**`string`**

> 要被解析的值。如果参数不是一个字符串，则将其转换为字符串。字符串开头的空白符将会被忽略。
>
> 如果字符串 `string` 以"0x"或者"0X"开头, 则基数是16 (16进制).
>
> 如果字符串 `string` 以"0"开头, 基数是8（八进制）或者10（十进制），那么具体是哪个基数由实现环境决定。ECMAScript 5 规定使用10，但是并不是所有的浏览器都遵循这个规定。因此，**永远都要明确给出radix参数的值**。
>
> 如果字符串 `string` 以其它任何值开头，则基数是10 (十进制)。

**`radix`**

> 一个2到36之间的整数值，用于指定转换中采用的基数。比如参数"10"表示使用我们通常使用的十进制数值系统。**总是指定该参数**可以消除阅读该代码时的困惑并且保证转换结果可预测。当忽略该参数时，不同的实现环境可能产生不同的结果。

### `fun.call()`

使用一个指定的`this`值和若干个指定的参数值的前提下调用某个函数或方法

> 注意：该方法的作用和`apply()`方法类似，只有一个区别，就是`call()`方法接受的是**若干个参数的列表**，而`apply()`方法接受的是**一个包含多个参数的数组**

```javascript
fun.call(thisArg[, arg1[, arg2[, ...]]]);
```

**`thisArg`**

> 在*fun*函数运行时指定的`this`值*。*需要注意的是，指定的`this`值并不一定是该函数执行时真正的`this`值，如果这个函数处于**非严格模式下**，则指定为`null`和`undefined`的`this值会自动指向`全局对象(浏览器中就是window对象)，同时值为原始值(数字，字符串，布尔值)的`this`会指向该原始值的自动包装对象。
>

## String 对象

### `str.match()`

字符串内检索指定的值,或找到一个或多个正则表达式的匹配

```javascript
str.match(searchvalue);
str.match(regexp);
```

### `str.split()`

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

### `str.toLowerCase()`

字符串转为小写形式

```javascript
str.toLowerCase();
```

### `str.toUpperCase()`

字符串转为大写形式

```javascript
str.toUpperCase();
```

### `str.replace()`

使用一个替换值（replacement）替换掉一个匹配模式（pattern）在原字符串中某些或所有的匹配项，并返回替换后的新的字符串

```javascript
str.replace(regexp|substr, newSubStr|function);
```

### `str.slice()`

提取字符串的某个部分，并以新的字符串返回被提取的部分

```javascript
str.slice(start,end);
```

### `str.substr()`

返回字符串中从指定位置开始到指定长度的子字符串

```javascript
str.substr(start[, length]);
```

### `str.repeat()`

构造并返回一个重复当前字符串若干次数的新字符串

```javascript
var newStr = str.repeat(count);
```

### `str.indexOf()`

返回指定值在字符串对象中首次出现的位置,从formIndex位置开始查找,如果不存在,则返回-1

```javascript
str.indexOf(searchValue[, formIndex]);
```

### `String.fromCharCode()`

String对象提供的静态方法,根据指定的Unicode编码中的序号值来返回一个字串

```javascript
String.fromCharCode(num1, ..., numN);
```

### `str.charCodeAt()`

返回给定位置字符的Unicode码点,相当与String.fromCharCode()的逆操作

```javascript
str.charCodeAt(index);
```

### `str.bold()`

创建 HTML 元素 “b”，并将字符串加粗展示

```javascript
str.bold();
```

###  `str.charAt()`

返回字符串中指定位置的字符

```javascript
str.charAt(index);
```

## Math对象

### `Math.random()`

返回介于0~1之间的一个随机数

```javascript
Math.random();
```

### `Math.floor()`

对一个数进行下舍入

```javascript
Math.floor(x);
```

### `Math.min()`

返回零个或更多个数值的最小值

```javascript
Math.min([value1[, value2, ...]]);
```

### `Math.max()`

返回一组数中的最大值

```javascript
Math.max([value1[, value2, ...]]);
```

## JSON 对象

### `JSON.parse()`

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

### `JSON.stringify()`

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

## Array 对象

### `arr.map()`

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

### `arr.reduce()`

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

### `arr.filter()`

返回数组中的满足回调函数中指定的条件的元素

```javascript
arr.filter(callbackfn[, thisArg]);
```

**返回值**
一个包含回调函数为其返回 true 的所有值的新数组。如果回调函数为 array1 的所有元素返回 false，则新数组的长度为 0。

**回调函数语法**

> 同map

### `arr.sort()`

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

### `arr.reverse()`

反转 Array 中的元素

```javascript
arr.reverse();
```

### `arr.concat()`

组合两个或两个以上的非数组或数组

```javascript
arr.concat([item1[, item2[, . . . [, itemN]]]]);
```

### `arr.join()`

添加由指定分隔符字符串分隔的数组的所有元素

```javascript
arr.join([separator]);
```

### `arr.push()`

添加一个或多个元素到数组的末尾，并返回数组新的长度（length 属性值）

```javascript
arr.push(element1, ..., elmentN);
```

### `arr.slice()`

复制数组的一部分到一个新的数组,并返回这个数组

```javascript
arr.slice([begin[, end]]);
```

### `arr.splice()`

用新元素替换旧元素,以此修改数组的内容

```javascript
arr.splice(start, deleteCount[, item1[, item2, ...]]);
```

### `arr.filter()`

使用指定的函数测试所有的元素,并创建一个包含所有通过测试的元素的新数组

```javascript
arr.filter(callback[, thisArr]);
```

**回调函数语法**
`function callback(element, index, array)`

> 返回true表示保留该元素
>
> 返回false则不保留

### `arr.indexOf()`

返回给定元素能找在数组中找到的第一个索引值,否则返回-1

```javascript
arr.indexOf(searchElement[, fromIndex = 0]);
```

### `arr.forEach()`

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

## Object对象

### `Object.keys()`

返回一个由给定对象的所有可枚举自身属性的属性名组成的数组，数组中属性名的排列顺序和使用`for-in`循环遍历该对象时返回的顺序一致（两者的主要区别是for-in`还会遍历出一个对象从其原型链上继承到的可枚举属性）。

```javascript
Object.keys(obj);
```

### `obj.toString()`

返回一个代表该对象的字符串

```javascript
obj.toString();
```

可接受一个参数，表示要使用几进制。

默认为十进制。

允许的最大进制是36。

**例子**

```javascript
(62).toString();    // "62"
(62).toString(2);   // "111110"
(62).toString(8);   // "76"
(62).toString(10);  // "62"
(62).toString(16);  // "3e"
(62).toString(32);  // "1u"
```

## Document

### `document.querySelectorAll()`

返回当前文档中匹配一个特定选择器的所有的元素(使用深度优先，前序遍历规则这样的规则遍历所有文档节点) .返回的对象类型是 NodeList

```javascript
elementList = document.querySelectorAll(selectors);
```

> 在Chrome浏览器中可以用`$$()`

### `document.querySelector()`

返回当前文档中匹配一个特定选择器的第一个元素

```javascript
element = document.querySelector(selectors);
```

### `document.cookie`

获取和设置与当前文档相关联的 cookie

**获取所有 cookie**

```javascript
allCookies = document.cookie;
```

**写一个新 cookie**

```javascript
document.cookie = updatedCookie;
```

`updatedCookie` 是一个键值对形式的字符串。注意，你只能用这个方法一次设置或更新一个 cookie。

* 以下可选的 cookie 属性值跟在键值对后，定义 cookie 的设定/更新，跟着一个分号以作分隔：
  * `;path=*path*` (例如 '/', '/mydir') 如果没有定义，默认为当前文档位置的路径。
  * `;domain=*domain*` (例如 'example.com'， '.example.com' (包括所有子域名), 'subdomain.example.com') 如果没有定义，默认为当前文档位置的路径的域名部分。
  * `;max-age=*max-age-in-seconds*` (例如一年为 60*60*24 * 365)
  * `;expires=*date-in-GMTString-format*` 如果没有定义，cookie 会在对话结束时过期这个值的格式参见 `Date.toUTCString()`
  * `;secure` (cookie 只通过 https 协议传输)


## Windows

### `window.setInterval()`

周期性地调用一个函数或者执行一段代码

```javascript
var intervalID = window.setInterval(func, delay[, param1, param2, ...]);
```

## HTMLElement

### `HTMLElement.contentEditable`

**`HTMLElement.contentEditable`** 属性用于表明元素是否是可编辑的。该枚举属性（enumerated attribute）可以具有下面的几种值之一：

* `"true"` 表明该元素可编辑。
* `"false"` 表明该元素不可编辑。
* `"inherit"` 表明该元素继承了其父元素的可编辑状态。

```javascript
editable = element.contentEditable
element.contentEditable = "true"
```

## RegExp

### `regexObj.test()`

执行一个检索，用来查看正则表达式与指定的字符串是否匹配。返回 `true` 或 `false`

```javascript
regexObj.test(str);
```



# jQuery

## Dom add

### `jQuery.append()`

在被选元素的结尾插入内容

```javascript
$(selector).append(content);
```

### `jQuery.prepend()`

在被选元素的开头插入内容

```javascript
$(selector).prepend(content);
```

### `jQuery.after()`

在被选元素之后插入内容

```javascript
$(selector).after(content);
```

### `jQuery.before()`

在被选元素之前插入内容

```javascript
$(selector).before(content);
```

## Traversing

### `jQuery.parent()`

返回被选元素的直接父元素

```javascript
$(selector).parent();
```

### `jQuery.parents()`

返回被选元素的所有祖先元素，它一路向上直到文档的根元素

```javascript
$(selector).parents();
```

### `jQuery.parentsUntil()`

返回介于两个给定元素之间的所有祖先元素

```javascript
$(selector1).parentsUntil(selector2);
```

### `jQuery.children()`

返回被选元素的所有直接子元素

```javascript
$(selector).children([selector]);
```

### `jQuery.find()`

返回被选元素的后代元素，一路向下直到最后一个后代

```javascript
$(selector1).find(selector2);
```

### `jQuery.siblings()`

返回被选元素的所有同胞元素

```javascript
$(selector).sibligs([selector]);
```

### `jQuery.next()`

返回被选元素的下一个同胞元素

```javascript
$(selector).next();
```

### `jQuery.nextAll()`

返回被选元素的所有跟随的同胞元素

```javascript
$(selector).nextAll();
```

### `jQuery.nextUntil()`

返回介于两个给定参数之间的所有跟随的同胞元素

```javascript
$(selector1).nextUntil(selector2);
```

### `jQuery.prev()`

返回被选元素的前一个同胞元素

```javascript
$(selector).prev([selector]);
```

### `jQuery.prevAll()`

返回被选元素的所有前面的同胞元素

```javascript
$(selector).prevAll([selector]);
```

### `jQuery.prevUntil()`

返回介于两个给定参数之间的所有前面的同胞元素

```javascript
$(selector).prevUntil([selector][, filter]);
$(selector).prevUntil([element][, filter])
```

### `jQuery.first()`

返回被选元素的首个元素

```javascript
$(selector).first();
```

### `jQuery.last()`

返回被选元素的最后一个元素

```javascript
$(selector).last();
```

### `jQuery.eq()`

返回被选元素中带有指定索引号的元素

```javascript
$(selector).eq(index);
```

### `jQuery.filter()`

匹配元素集合缩减为匹配指定选择器的元素

```javascript
$(selector).filter(selector);
```

### `jQuery.not()`

返回不匹配标准的所有元素

```javascript
$(selector).not(selector);
$(selector).not(element);
$(selector).not(function(index));
```

## AJAX

### `jQuery.getJSON()`

使用 `AJAX` 请求来获得 `JSON` 数据

```javascript
$.getJSON(url,data,success(data,status,xhr));
```



# 运算符

## 按位非运算符

位运算`NOT`由否定号`~`表示。

> 位运算`NOT`是三步的处理过程：
> 1. 把运算数转换成32位数字
> 2. 把二进制数转换成它的二进抽反码
> 3. 把二进制数转换成浮点数

对任一数值x进行按位非操作的结果为`-(x + 1)`



# JavaScript 小技巧

## 取整

```javascript
var a = 1.99999,
    b = -1234.56789,
    c = 9876.00001;

~~a;  // 1
~~b;  // -1234
~~c;  // 9876

0 | a; // 1
0 | b; // -1234
0 | c; // 9876
```

## 神奇的六个字符

`[`,`]`,`(`,`)`,`!` and `+`

- `!` 后面跟的字符会被转换成布尔值
- `+` 后面跟的字符会被转换成数值
- `[]` 后面跟的字符会被转换成字符串

```javascript
![]    === false
!![]   === true
[][[]] === undefined
+[]    === 0
+!+[]  === 1
[]+[]  === ""
```

## 判断一个单词是否是回文

```javascript
function checkPalindrom(str) {
  return str == str.split('').reverse().join('');
}
```

