# 字符编码

[字符编码笔记：ASCII，Unicode 和 UTF-8](http://www.ruanyifeng.com/blog/2007/10/ascii_unicode_and_utf-8.html)

## UTF-8 实现 Unicode

| Unicode符号范围(十六进制) | UTF-8编码方式（二进制）             |
| :---:                     | :---:                               |
| 0000 0000-0000 007F       | 0xxxxxxx                            |
| 0000 0080-0000 07FF       | 110xxxxx 10xxxxxx                   |
| 0000 0800-0000 FFFF       | 1110xxxx 10xxxxxx 10xxxxxx          |
| 0001 0000-0010 FFFF       | 11110xxx 10xxxxxx 10xxxxxx 10xxxxxx |
