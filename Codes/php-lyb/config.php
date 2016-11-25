<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: config.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-03-30 16:40
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


/*$db = array(
    'driver'   => 'mysql',
    'host'     => 'localhost',
    'database' => '',
    'username' => 'root',
    'password' => 'root',
);*/

define('DEBUG', true);
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '');
define('DB_NAME', 'guestbook');
define('GB_TABLE_NAME', 'Guestbook');
define('ADMIN_TABLE_NAME', 'User');
define('PER_PAGE_GB', 5);
define('TITLE', 'PHP留言本');

if (DEBUG) {
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}
