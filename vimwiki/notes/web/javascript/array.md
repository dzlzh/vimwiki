# JavaScript - Array

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

组合两个或两个以上的非数组或数组

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
