# jQuery - Traversing

## `jQuery.parent()`

返回被选元素的直接父元素

```javascript
$(selector).parent();
```

## `jQuery.parents()`

返回被选元素的所有祖先元素，它一路向上直到文档的根元素

```javascript
$(selector).parents();
```

## `jQuery.parentsUntil()`

返回介于两个给定元素之间的所有祖先元素

```javascript
$(selector1).parentsUntil(selector2);
```

## `jQuery.children()`

返回被选元素的所有直接子元素

```javascript
$(selector).children([selector]);
```

## `jQuery.find()`

返回被选元素的后代元素，一路向下直到最后一个后代

```javascript
$(selector1).find(selector2);
```

## `jQuery.siblings()`

返回被选元素的所有同胞元素

```javascript
$(selector).sibligs([selector]);
```

## `jQuery.next()`

返回被选元素的下一个同胞元素

```javascript
$(selector).next();
```

## `jQuery.nextAll()`

返回被选元素的所有跟随的同胞元素

```javascript
$(selector).nextAll();
```

## `jQuery.nextUntil()`

返回介于两个给定参数之间的所有跟随的同胞元素

```javascript
$(selector1).nextUntil(selector2);
```

## `jQuery.prev()`

返回被选元素的前一个同胞元素

```javascript
$(selector).prev([selector]);
```

## `jQuery.prevAll()`

返回被选元素的所有前面的同胞元素

```javascript
$(selector).prevAll([selector]);
```

## `jQuery.prevUntil()`

返回介于两个给定参数之间的所有前面的同胞元素

```javascript
$(selector).prevUntil([selector][, filter]);
$(selector).prevUntil([element][, filter])
```

## `jQuery.first()`

返回被选元素的首个元素

```javascript
$(selector).first();
```

## `jQuery.last()`

返回被选元素的最后一个元素

```javascript
$(selector).last();
```

## `jQuery.eq()`

返回被选元素中带有指定索引号的元素

```javascript
$(selector).eq(index);
```

## `jQuery.filter()`

匹配元素集合缩减为匹配指定选择器的元素

```javascript
$(selector).filter(selector);
```

## `jQuery.not()`

返回不匹配标准的所有元素

```javascript
$(selector).not(selector);
$(selector).not(element);
$(selector).not(function(index));
```