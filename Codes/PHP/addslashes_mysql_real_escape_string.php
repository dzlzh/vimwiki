<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2016 DZLZH All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: DZLZH <dzlzh@null.net>
 *  +--------------------------------------------------------------
 *  | Filename: addslashes_mysql_real_escape_string.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2016-07-27 16:54
 *  +--------------------------------------------------------------
 *  | Description: Mysql字符集编码不同注入
 *  +--------------------------------------------------------------
 */

//PHP防Mysql字符集编码不同addslashes和mysql_real_escape_string注入

echo "PHP version: ".PHP_VERSION."\n";
$db=mysqli_connect(localhost,'','');
mysqli_select_db($db,"test2");
mysqli_query($db,"SET NAMES GBK");

$_POST['username'] = chr(0xbf).chr(0x27)." OR 1=1 -- /*";
//$_POST['username'] = chr(0xbf).chr(0x5c).' OR username = username /*';
$_POST['password'] = 'guess';

echo "\n----addslashes-----\n";
echo $username = addslashes($_POST['username']);
echo "\n";
$password = addslashes($_POST['password']);
//echo $sql = "SELECT * FROM  users WHERE  username = '$username' AND password = '$password'";echo $sql = "SELECT * FROM  users WHERE  username = '$username'";
echo "\n";
$result = mysqli_query($db,$sql) or trigger_error(mysqli_error($db).$sql);
var_dump(mysqli_num_rows($result));
var_dump(mysqli_client_encoding($db));

echo "\n---------\n";
echo $username = mysqli_real_escape_string($db,$_POST['username']);
echo "\n";
$password = mysqli_real_escape_string($db,$_POST['password']);
//$sql = "SELECT * FROM  users WHERE  username = '$username' AND password = '$password'";echo $sql = "SELECT * FROM  users WHERE  username = '$username'";
echo "\n";
$result = mysqli_query($db,$sql) or trigger_error(mysqli_error($db).$sql);
var_dump(mysqli_num_rows($result));
var_dump(mysqli_client_encoding($db));

echo "\n---------\n";
mysqli_set_charset($db,"GBK");
echo $username = mysqli_real_escape_string($db,$_POST['username']);
echo "\n";
$password = mysqli_real_escape_string($db,$_POST['password']);
//$sql = "SELECT * FROM  users WHERE  username = '$username' AND password = '$password'";echo $sql = "SELECT * FROM  users WHERE  username = '$username'";
echo "\n";
$result = mysqli_query($db,$sql) or trigger_error(mysqli_error($db).$sql);
var_dump(mysqli_num_rows($result));
var_dump(mysqli_client_encoding($db));

