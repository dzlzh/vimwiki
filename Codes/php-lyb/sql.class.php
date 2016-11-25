<?PHP
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2015 http://duanzhilei.tk All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: zhilei.duan <duanzhileizh@gmail.com>
 *  +--------------------------------------------------------------
 *  | Filename: sql_class.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2015-03-31 17:32
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


/**
 * DB class
 *
 * @package default
 * @subpackage default
 * @author dzlzh
 */
class DB
{
    public static $_connect = null;

    /**
     * connect
     *
     * @return void
     */
    public static function connect()
    {
        if (!self::$_connect) {
            $conn = mysql_connect(DB_HOST, DB_USER, DB_PWD);
            if ($conn) {
                mysql_select_db(DB_NAME, $conn);
                mysql_query("set names 'utf8'");
                self::$_connect = $conn;
            } else {
                exit('database error!');
            }
        }

        return self::$_connect;
    }

    /**
     * cleanSql
     *
     * @return void
     */
    public static function cleanSql($sql)
    {
        return mysql_real_escape_string($sql);
    }

    /**
     * query
     *
     * @return void
     */
    public static function query($sql)
    {
        self::connect();
        $res = mysql_query($sql);
        return $res;
    }

    /**
     * close
     *
     * @return void
     */
    public static function close()
    {
        if (self::$_connect) {
            mysql_close(self::$_connect);
        }
    }
    
} // END class DB
