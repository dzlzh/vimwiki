<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: login.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-01 16:41
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


require_once '../config.php';
require_once '../sql.class.php';

DB::connect();
$user = DB::cleanSql($_POST['uname']);
$pwd = DB::cleanSql($_POST['password']);

$sql_login = 'select password from ' . ADMIN_TABLE_NAME . ' where level = 9 and nickname = ' . "'{$user}' limit 1";
echo $sql_login;
$insert_status = DB::query($sql_login);
$password = mysql_fetch_array($insert_status)[0];
DB::close();
if(md5($pwd) === $password) {
    session_start();
    $_SESSION['admin'] = true;
    header('location:admin.php');
} else {
    header('location:index.html');
}
