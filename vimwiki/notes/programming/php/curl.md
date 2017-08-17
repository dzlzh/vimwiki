# PHP - CURL

##  `curl_setopt_array()`

为cURL传输会话批量设置选项

```php
bool curl_setopt_array ( resource $ch , array $options );
```

## `setopt` 设置选项

- `CURLOPT_HTTPHEADER` 设置 HTTP 头字段的数组。格式： `array('Content-type: text/plain', 'Content-length: 100')`
- `CURLOPT_POST` `TRUE` 时会发送 `POST` 请求，类型为：`application/x-www-form-urlencoded`，是 HTML 表单提交时最常见的一种。	

### 重定向

- `CURLOPT_FOLLOWLOCATION` `TRUE` 时将会根据服务器返回 HTTP 头中的 "`Location:`" 重定向。(递归)
- `CURLOPT_MAXREDIRS` 指定最多的 HTTP 重定向次数，这个选项是和 `CURLOPT_FOLLOWLOCATION` 一起使用的。

## CURLFile 类

```php
CURLFile {
    /* 属性 */
    public $name ;
    public $mime ;
    public $postname ;

    /* 方法 */
    public __construct ( string $filename [, string $mimetype [, string $postname ]] )
    public string getFilename ( void )
    public string getMimeType ( void )
    public string getPostFilename ( void )
    public void setMimeType ( string $mime )
    public void setPostFilename ( string $postname )
    public void __wakeup ( void )
}
```

> `CURLFile` 应该与选项 `CURLOPT_POSTFIELDS` 一同使用用于上传文件。
