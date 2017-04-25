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
    private function query($sql, $params)
    {
        $stmt = $this->conn->prepare($sql);
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
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
    public function getAll($sql, $params = null)
    {
        return $this->query($sql, $params)->fetchall(PDO::FETCH_ASSOC);
    }

    /**
     * 取回一条结果
     *
     * @return void
     */
    public function getRow($sql, $params = null)
    {
        return $this->query($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * 取回一列结果
     *
     * @return void
     */
    public function getOne($sql, $params = null)
    {

        $data = $this->query($sql, $params)->fetch(PDO::FETCH_NUM);
        return $data[0];
    }
    
    /**
     * 插入
     *
     * @return void
     */
    public function insert($tableName, $data)
    {
        if (empty($data)) {
            return false;
        }
        $keys = array_keys($data);
        $fields = $keys;
        array_walk($fields, array('PDOMysql', 'addSpecialChar'));
        $fields = implode(',', $fields);
        $parameters = $keys;
        foreach ($parameters as $k => $v) {
            $parameters[$k] = ':' . $v;
        }
        $parameters = implode(',', $parameters);
        $sql = 'INSERT INTO `' . $tableName . '` (' . $fields . ') VALUE (' . $parameters . ')';
        $stmt = $this->query($sql, $data);
        return $this->conn->lastInsertId();

    }

    /**
     * 更新
     *
     * @return void
     */
    public function update($tableName, $data, $where, $whereParams = null)
    {
        if (empty($data)) {
            return false;
        }
        $keys = array_keys($data);
        $fields = $keys;
        array_walk($fields, array('PDOMysql', 'addSpecialChar'));
        foreach ($keys as $key => $value) {
            $parameters[$key] = $fields[$key] . '=:' . $value;
        }
        $parameters = implode(',', $parameters);
        $sql = 'UPDATE `' . $tableName . '` SET ' . $parameters;
        if (!empty($where)) {
            $sql .= ' WHERE ' . $where;
            if (is_array($whereParam)) {
                $params = array_merge($data, $whereParams);
            }
        }
        $stmt = $this->query($sql, $params);
        return self::errorMsg($stmt);
    }

    /**
     * 删除
     *
     * @return void
     */
    public function del($tableName, $where, $whereParams = null)
    {
        $sql = 'DELETE FROM `' . $tableName . '`';
        if (!empty($where)) {
            $sql .= ' WHERE ' . $where;
        }
        $stmt = $this->query($sql, $whereParams);
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

    public function qstr($string)
    {
        return $this->conn->quote($string);
    }
    
}

