# JavaScript - String

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

## `str.bold()`

创建 HTML 元素 “b”，并将字符串加粗展示

```javascript
str.bold();
```

##  `str.charAt()`

返回字符串中指定位置的字符

```javascript
str.charAt(index);
```