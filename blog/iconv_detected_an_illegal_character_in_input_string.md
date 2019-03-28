# iconv(): Detected an illegal character in input string

在导出 `.csv` 数据时，需要把 `UTF-8` 的数据转成 `GBK` 发现有好多错误
`iconv(): Detected an illegal character in input string`

错误原因可能是存在 `GBK` 不包含的字，于是使用更大的字符集 `GB18030` ，修改后的代码为：

```php
$value = iconv('UTF-8', 'GB18030', $value);
```

后翻阅 `iconv` 的文档后，可加上 `//TRANSLIT//IGNORE` 两个选项。修改后的代码为：

```php
$value = iconv('UTF-8', 'GB18030//TRANSLIT//IGNORE', $value);
```
