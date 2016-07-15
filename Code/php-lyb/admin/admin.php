<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: admin.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-01 15:46
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */
header ("Content-type:text/html; charset=utf8");
session_start();
if (!$_SESSION['admin']) {
    header('location:index.html');
}

require_once '../config.php';
require_once '../sql.class.php';

$gb_count_sql = 'select count(*) from ' . GB_TABLE_NAME . ' where status = 0';
DB::connect();
$gb_count_res = DB::query($gb_count_sql);
$gb_count = mysql_fetch_array($gb_count_res)[0];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$pagenum = ceil($gb_count / PER_PAGE_GB);
if ($page < 0) {
    $page = 1;
} elseif($page > $pagenum) {
    $page = $pagenum;
}
$resnum = ($page -1) * PER_PAGE_GB;

$pagedata_sql = 'select * from ' . GB_TABLE_NAME . ' where status = 0 order by createtime desc limit ' . $resnum . ',' . PER_PAGE_GB;
$sql_page_result = DB::query($pagedata_sql);
while ($temp = mysql_fetch_array($sql_page_result)) {
    $sql_page_array[] = $temp;
}
DB::close();

foreach ($sql_page_array as $key=>$value) {
    echo '<br/><div>';
    echo '<input type="hidden" value="' . $value['id'] . '" id="id"/>';
    echo '留言者：' . $value['nickname'] . '|';
    echo 'E-MAIL：' . $value['email'] . '<br/>';
    echo '内容：' . $value['content'] . '<br/>';
    echo '时间：' . date('Y-m-d H:i:s', $value['createtime']) . '<br/>';
    if (!empty($value['reply'])) {
        echo '管理员回复：' . $value['reply'] . '|';
        echo '回复时间：' . date('Y-m-d H:i:s', $value['replytime']) . '<br/>';
    } else {
        echo    '<div id="replydiv" style="visibility:hidden">回复：<input type="text" name="replytext" value="" ></div>';
        echo '<input type="button" name="reply" value="reply"/>';
    }
    echo '<input type="button" name="delete" value="delete"/></div>';
    echo '<hr/>';
}

echo '共 ' . $gb_count . ' 条留言 ';
if ($pagenum > 1) {
    for ($i = 1; $i <= $pagenum; $i++) {
        if ($i == $page) {
            echo ' [' . $i . '] ';
        } else {
            echo '<a href="?page=' . $i .'">' . $i . '</a>';
        }
        
    }
}
?>

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="../js/ajax_submit.js"></script>
