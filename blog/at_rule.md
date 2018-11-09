# AT - 规则：@import，@media 和 @font-face

## font-face 规则

`@font-face` 它现在被广泛用作在网页中嵌入字体。

```
@font-face {
    font-family: "font of all knowledge";
    src: local("font of all knowledge"), local(fontofallknowledge), url(fontofallknowledge.woff);
    font-weight: 400;
    font-style: normal;
}
```

> Firefox、Chrome、Safari 以及 Opera 支持 .ttf (True Type Fonts) 和 .otf (OpenType Fonts) 类型的字体。
> 
> Internet Explorer 9+ 支持新的 font-face 规则，但是仅支持 .eot 类型的字体 (Embedded OpenType)。

## import 规则

`@import规则` 用来导入其它的 CSS 文件。

```
@import URL（morestyles.css）;
```

如果一个站点需要很长的，复杂的样式表如果他们被分解成更小的文件中，可能会更容易管理。

> `@import` 规则必须被放置在一个样式表的顶部，在任何其他规则上面。

## media 规则

`@media` 可用于样式应用到一个特定的媒体，如印刷品。

```
@media print {
    body {
        font-size: 10pt;
        font-family: times, serif;
    }

    #navigation {
        display: none;
    }
}
```

`@media` 可以包括_屏幕 (screen)_，_打印 (print)_，_投影 (projection)_，_手持式设备 (handheld)_，和_所有 (all)_，或以逗号分隔的多个列表，如：

```
@media screen, projection {
    /* ... */
}
```

> CSS 3 允许你的目标不只是特定的媒体也涉及该媒体的变量，如屏幕尺寸（针对手机特别有帮助）。
