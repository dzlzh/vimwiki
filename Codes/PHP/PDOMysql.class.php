<?php
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2017 DZLZH All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: DZLZH <dzlzh@null.net>
 *  +--------------------------------------------------------------
 *  | Filename: PDOMysql.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2017-04-05 17:19
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


class PDOMysql
{
    private $conn = null;

    public function __construct($configs)
    {
        extract($configs);
        $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        try {
            $this->conn = new PDO($dsn, $username, $password);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * 执行 SQL
     *
     * @return void
     */
    private function query($sql, $arr)
    {
        $stmt = $this->conn->prepare($sql);
        if (is_array($arr)) {
            foreach ($arr as $k => $v) {
                $stmt->bindValue($k, $v);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    /**
     * 取回全部结果
     *
     * @return void
     */
    public function findAll($sql, $arr = null)
    {
        return $this->query($sql, $arr)->fetchall(PDO::FETCH_ASSOC);
    }

    /**
     * 取回一条结果
     *
     * @return void
     */
    public function findOne($sql, $arr = null)
    {
        return $this->query($sql, $arr)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 插入
     *
     * @return void
     */
    public function insert($table, $arr)
    {
        if (empty($arr)) {
            return false;
        }
        $keys = array_keys($arr);
        $fields = $keys;
        array_walk($fields, array('PDOMysql', 'addSpecialChar'));
        $fields = implode(',', $fields);
        $parameters = $keys;
        foreach ($parameters as $k => $v) {
            $parameters[$k] = ':' . $v;
        }
        $parameters = implode(',', $parameters);
        $sql = 'INSERT INTO `' . $table . '` (' . $fields . ') VALUE (' . $parameters . ')';
        $stmt = $this->query($sql, $arr);
        return $this->conn->lastInsertId();

    }

    /**
     * 更新
     *
     * @return void
     */
    public function update($table, $arr, $where)
    {
        if (empty($arr)) {
            return false;
        }
        $keys = array_keys($arr);
        $fields = $keys;
        array_walk($fields, array('PDOMysql', 'addSpecialChar'));
        foreach ($keys as $key => $value) {
            $parameters[$key] = $fields[$key] . '=:' . $value;
        }
        $parameters = implode(',', $parameters);
        $sql = 'UPDATE `' . $table . '` SET ' . $parameters;
        if (!empty($where)) {
            $sql .= ' WHERE ' . $where;
        }
        $stmt = $this->query($sql, $arr);
        return self::errorMsg($stmt);
    }

    /**
     * 删除
     *
     * @return void
     */
    public function del($table, $where)
    {
        $sql = 'DELETE FROM `' . $table . '`';
        if (!empty($where)) {
            $sql .= ' WHERE ' . $where;
        }
        $stmt = $this->query($sql, null);
        return self::errorMsg($stmt);
    }

    private static function errorMsg($stmt)
    {
        $errorCode = $stmt->errorCode();
        if ($errorCode !== '00000') {
            $errorInfo = $stmt->errorInfo();
            $errorMsg = 'ERROR '. $errorInfo[1] . ' (' . $errorInfo[0] . '):' . $errorInfo[2];
            return $errorMsg;
        } else {
            return $stmt->rowCount();
        }
    }
    
    private static function addSpecialChar(&$value)
    {
        if($value !== '*' || strpos($value, '.') === false || strpos($value, '`') === false) {
            $value = '`' . trim($value) . '`';
        }

        return $value;
    }
    
}

