# [time](https://go-zh.org/pkg/time)

## `Now()`

当前时间

## `time.Format`

对时间进行格式化输出

- 月份 1,01,Jan,January
- 日　 2,02,_2
- 时　 3,03,15(24 小时制）,PM,pm,AM,am
- 分　 4,04
- 秒　 5,05
- 年　 06,2006
- 时区 -07,-0700,Z0700,Z07:00,-07:00,MST
- 周几 Mon,Monday

## `time.Parse`

解析字符串类型的时间到 `time.Time`
