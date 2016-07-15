<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: delete.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-02 16:03
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */

require_once '../sql.class.php';
require_once '../config.php';

$id = $_POST['id'];
DB::connect();
DB::cleanSql($id);
$sql_update = "update " . GB_TABLE_NAME . " set status = 1 where id = {$id}";
$res = DB::query($sql_update);
DB::close();

if ($res < 1) {
    exit('{"error":1, "msg":"删除失败！"}');
} else {
    exit('{"error":0, "msg":"删除成功！"}');
}


