# CSS 杂记

## css 样式优先级

内联样式表（标签内部）> 嵌入样式表（当前文件中）> 外部样式表（外部文件中）。

## 权值

浏览器会根据权值来判断使用哪种 css 样式的，权值高的就使用哪种 css 样式。

- 标签的权值为 1
- 类选择符的权值为 10
- ID 选择符的权值最高为 100

```
p{color:red;}  /*权值为1*/
p span{color:green;}  /*权值为1+1=2*/
.warning{color:white;}  /*权值为10*/
p span.warning{color:purple;}  /*权值为1+1+10=12*/
#footer .note p{color:yellow;}  /*权值为100+10+1=111*/
p{color:red!important;}  /*权值为1但是因为有!important为最高权值*/
```

> 可以用 `!important` 来设置最高权值 `!important` 优先级样式，权值高于用户自己设置的样式。

## 层叠

层叠就是在 html 文件中对于同一个元素可以有多个 css 样式存在，当有相同权重的样式存在时，会根据这些 css 样式的前后顺序来决定，处于最后面的 css 样式会被应用。

## px/em/pt 单位

- px 像素 Pixel, 相对长度单位
- em 相对长度单位, 相对于当前对象内文本的字体尺寸
- pt 点（Point）, 绝对长度单位

> 如果元素的 `font-size` 为 14px ，那么 1em = 14px；如果 `font-size` 为 18px，那么 1em = 18px。

## 盒模型代码简写

盒模型方向 上、右、下、左。（顺时针）

