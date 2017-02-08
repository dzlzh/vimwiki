<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: reply.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-01 17:15
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */

require_once '../config.php';
require_once '../sql.class.php';

$id = $_POST['id'];
$reply = $_POST['reply'];
$replytime = time();
DB::connect();
DB::cleanSql($id);
DB::cleanSql($reply);
$sql_update = "update " . GB_TABLE_NAME . " set  reply='{$reply}', replytime={$replytime} where id={$id}";
$res = DB::query($sql_update);
DB::close();

if ($res < 1) {
    exit('{"error":1, "msg":"回复失败！"}');
} else {
    exit('{"error":0, "msg":"回复成功！"}');
}

