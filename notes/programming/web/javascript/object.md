# JavaScript - Object

## `Object.keys()`

返回一个由给定对象的所有可枚举自身属性的属性名组成的数组，数组中属性名的排列顺序和使用`for-in`循环遍历该对象时返回的顺序一致（两者的主要区别是for-in`还会遍历出一个对象从其原型链上继承到的可枚举属性）。

```javascript
Object.keys(obj);
```

## `obj.toString()`

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
