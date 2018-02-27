# [练习：图像](https://tour.go-zh.org/methods/25)

## 练习：图像

还记得之前编写的图片生成器吗？我们再来编写另外一个，不过这次它将会返回一个 `image.Image` 的实现而非一个数据切片。

定义你自己的 `Image` 类型，实现必要的方法并调用 `pic.ShowImage`。

`Bounds` 应当返回一个 `image.Rectangle`，例如 `image.Rect(0, 0, w, h)`。

`ColorModel` 应当返回 `color.RGBAModel`。

`At` 应当返回一个颜色。上一个图片生成器的值 `v` 对应于此次的 `color.RGBA{v, v, 255, 255}`。

## 提示代码

```go
package main

import "golang.org/x/tour/pic"

type Image struct{}

func main() {
	m := Image{}
	pic.ShowImage(m)
}
```

## 解答

```go
package main

import (
	"golang.org/x/tour/pic"
	"image"
	"image/color"
)

type Image struct {
	w, h  int
	color uint8
}

func (img Image) Bounds() image.Rectangle {
	return image.Rect(0, 0, img.w, img.h)
}

func (img Image) ColorModel() color.Model {
	return color.RGBAModel
}

func (img Image) At(x, y int) color.Color {
	return color.RGBA{img.color + uint8(x), img.color + uint8(y), 255, 255}
}

func main() {
	m := Image{100, 100, 150}
	pic.ShowImage(m)
}
```
