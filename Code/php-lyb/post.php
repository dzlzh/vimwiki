<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: post.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-01 14:24
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */



require_once 'config.php';
require_once 'sql.class.php';
header("Content-Type:text/html;charset=utf8");


$nickname = $_POST['nickname'];
$content = $_POST['content'];
$email = $_POST['email'];

DB::connect();
if (empty($nickname) || empty($content)) {
    exit('{"error":1, "msg":"昵称或内容不能为空!"}');
}
if (!empty($email)) {
    $email_reg = '/\w+([-+.]\w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*/';
    if (!preg_match($email_reg, $email)) {
        exit('{"error":1, "msg":"email地址不合法！"}');
    }
} else {
    exit('{"error":1, "msg":"email不可以空！"}');
}
$nickname = DB::cleanSql($nickname);
$content = DB::cleanSql($content);
$email = DB::cleanSql($email);


$createtime = time();
$sql_insert = 'insert into ' . GB_TABLE_NAME . '(nickname, content, createtime, email) value(' . "'{$nickname}', '{$content}', {$createtime}, '{$email}')";

$instert_status = DB::query($sql_insert);
DB::close();
if ($instert_status < 1) {
    exit('{"error":1, "msg":"留言失败！"}');
}
exit('{"error":0, "msg":"留言成功！"}');

