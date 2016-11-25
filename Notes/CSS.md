# CSS

## [`@font-face`](https://developer.mozilla.org/zh-CN/docs/Web/CSS/@font-face)

允许网页开发者为其指定在线字体

```html
@font-face {
  [ font-family: <family-name>; ] ||
  [ src: [ <uri> [ format(<string>#) ]? | <font-face-name> ]#; ] ||
  [ unicode-range: <urange>#; ] ||
  [ font-variant: <font-variant>; ] ||
  [ font-feature-settings: normal | <feature-tag-value>#; ] ||
  [ font-stretch: <font-stretch>; ] ||
  [ font-weight: <weight>; ] ||
  [ font-style: <style>; ]
}
where 
<family-name> = <string> | <IDENT>+
<feature-tag-value> = <string> [ <integer> | on | off ]?
```

**示例**

```html
<html>
<head>
  <title>Web Font Sample</title>
  <style type="text/css" media="screen, print">
    @font-face {
      font-family: "Bitstream Vera Serif Bold";
      src: url("http://developer.mozilla.org/@api/deki/files/2934/=VeraSeBd.ttf");
    }
    
    body { font-family: "Bitstream Vera Serif Bold", serif }
  </style>
</head>
<body>
  This is Bitstream Vera Serif Bold.
</body>
</html>
```

