# JavaScript - HTMLElement

## `HTMLElement.contentEditable`

**`HTMLElement.contentEditable`** 属性用于表明元素是否是可编辑的。该枚举属性（enumerated attribute）可以具有下面的几种值之一：

* `"true"` 表明该元素可编辑。
* `"false"` 表明该元素不可编辑。
* `"inherit"` 表明该元素继承了其父元素的可编辑状态。

```javascript
editable = element.contentEditable
element.contentEditable = "true"
```