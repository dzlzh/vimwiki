# PHP CURL

##  `curl_setopt_array()`

为cURL传输会话批量设置选项

```php
bool curl_setopt_array ( resource $ch , array $options );
```

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
