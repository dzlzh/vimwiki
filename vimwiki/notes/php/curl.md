# PHP - CURL

##  `curl_setopt_array()`

为cURL传输会话批量设置选项

```php
bool curl_setopt_array ( resource $ch , array $options );
```

## `setopt` 设置选项

- `CURLOPT_HTTPHEADER` 设置 HTTP 头字段的数组。格式： `array('Content-type: text/plain', 'Content-length: 100')`
- `CURLOPT_POST` `TRUE` 时会发送 `POST` 请求，类型为：`application/x-www-form-urlencoded`，是 HTML 表单提交时最常见的一种。	

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
