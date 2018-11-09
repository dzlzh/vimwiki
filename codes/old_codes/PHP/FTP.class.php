<?php
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2017 DZLZH All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: DZLZH <dzlzh@null.net>
 *  +--------------------------------------------------------------
 *  | Filename: FTP.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2017-04-05 11:34
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


class FTP
{
    public $host     = '';
    public $port     = '';
    public $username = '';
    public $password = '';

    public $conn    = '';

    public function __construct($configs)
    {
        $this->host     = $configs['host'];
        $this->port     = $configs['port'];
        $this->username = $configs['username'];
        $this->password = $configs['password'];
    }

    /**
     * ftp connect
     *
     * @return bool
     */
    public function connect()
    {
        $this->conn = ftp_connect($this->host, $this->port) or die("Couldn't connect to $this->host");
        ftp_login($this->conn, 'tjtvftp', 'dbd725@tJtv2017') or die("Couldn't connect as $this->username");
        ftp_pasv($this->conn, true);
        return true;
    }

    /**
     * change dir
     *
     * @return bool
     */
    public function changeDir($dir)
    {
        return ftp_chdir($this->conn, $dir);
    }

    /**
     * get dir
     *
     * @return string
     */
    public function getDir()
    {
        return ftp_pwd($this->conn);
    }

    /**
     * get file list
     *
     * @return array
     */
    public function getFileList($dir)
    {
        var_dump(ftp_systype($this->conn));
        var_dump($dir);
        return ftp_nlist($this->conn, $dir);
    }
    
    /**
     * ftp close
     *
     * @return bool
     */
    public function close()
    {
        return ftp_close($this->conn);
    }
}
