<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: index.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-04-02 14:41
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */

header ("Content-type:text/html; charset=utf8");
require_once 'config.php'; 
require_once 'sql.class.php'; 

$gb_count_sql = 'SELECT COUNT(*) FROM ' . GB_TABLE_NAME . ' where status = 0';
DB::connect();
$gb_count_res = DB::query($gb_count_sql);
$gb_count = mysql_fetch_array($gb_count_res)[0];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$pagenum = ceil($gb_count / PER_PAGE_GB);
if ($page < 0) {
    $page = 1;
} elseif ($page > $pagenum) {
    $page = $pagenum;
}

$resnum = ($page - 1) * PER_PAGE_GB;

$pagedata_sql = 'select nickname,content,createtime,reply,replytime from ' . GB_TABLE_NAME . ' where status = 0 order by createtime desc limit ' . $resnum . ',' . PER_PAGE_GB;
$sql_page_result = DB::query($pagedata_sql);

while ($temp = mysql_fetch_array($sql_page_result)) {
    $sql_page_array[] = $temp;
}
DB::close();

foreach ($sql_page_array as $value) {
    echo '<br/>';
    echo '留言者：' . $value['nickname'] . '|';
    echo '时间：' . date('Y-m-d H:i:s', $value['createtime']) . '<br/>';
    echo '内容：' . $value['content'];
    if (!empty($value['reply'])) {
        echo '管理员回复：' . $value['reply'] . '|';
        echo '回复时间：' . date('Y-m-d H:i:s', $value['replytime']) . '<br/>';
    }
    echo '<br/>';
}

echo '共 ' . $gb_count . ' 条留言 ';
if ($pagenum > 1) {
    for ($i = 1; $i <= $pagenum; $i++) {
        if ($i == $page) {
            echo ' [' . $i . '] ';
        } else {
            echo '<a href="?page=' . $i .'"> ' . $i . '</a>';
        }
        
    }
}
?>

<div id="post">
    <form name="message_submit" id="form" action="">
      姓名：<input type="text" name="nickname" id="nickname" placeholder="必填" /><br />
      内容：<input type="text" name="content" id="content" placeholder="必填" /><br />
      E-MAIL:<input type="text" name="email" id="email" placeholder="E-MAIL" /><br />
      <input type="button" name="sub" value="留言" id="sub"/><input type="reset" value="重置" />
    </form>
</div>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="js/ajax_submit.js"></script>
