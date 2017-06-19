# JavaScript - 小技巧

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

## 类型转换

__数字__

```javascript
+'123.456'; //123.456 number
~~'123.456'; //123 取整
```

__字符串__

```javascript
'' + value;
```

__布尔__

```javascript
!!(0); //false
```