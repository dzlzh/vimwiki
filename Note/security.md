# PHP安全

**一切输入都是不可信的**

**一切输入都是不可信的**

**一切输入都是不可信的**

## 变量的处理

**web程序中所有`get` `post` `cookies` `update_files`来的变量都是不可信的**

* 输入的变量组成mysql SQL前都要用`mysql_real_escape_string()`处理
* 输入的变量回显在页面或者存入数据库钱都要用`htmlspecialchars()`函数处
* 对于传入的整数或浮点数可以使用`intval()`或`floatval()`处理
* 关闭`magic_quotes_runtime`安全掌握到自己的手里 `set_magic_quotes_runtime(false)`
* 严格控制上传文件类型
* 使用mysqli或者 PDO，不用或者少用mysql，避免SQL注入

## 数据加密

**序列化 -> 加密 -> 解密 -> 反序列化**

```php
$userinfo = '信息'; //用户信息
$secureKey = '密钥'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
echo "用户信息加密前：".$str;
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secureKey, $str, MCRYPT_MODE_ECB)); 
echo "用户信息加密后：".$str; //将加密后的用户数据存储到cookie中
setcookie('userinfo', $str); //当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secureKey, base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：<br>";
var_dump($uinfo);
```

## 密码加密

```php
$password = 'w110w110';
$salt = substr(uniqid(rand()), -6);
echo $salt . "<br>";
$password = md5(md5($password).$salt);
echo $password;
```





