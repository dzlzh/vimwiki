<?php
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2017 DZLZH All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: DZLZH <dzlzh@null.net>
 *  +--------------------------------------------------------------
 *  | Filename: FileUtil.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2017-04-08 14:20
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */

/**
 * Class FileUtil
 */
class FileUtil
{
    /**
     * 遍历目录
     *
     * @return void
     */
    public static function scanAllFile($path)
    {
        $files = array();
        if (!is_dir($path)) {
            return $files;
        }

        $handle = opendir($path);
        if ($handle) {
            while (false !== ($file = readdir($handle))) {
                if ($file != '.' && $file != '..') {
                    $filename = $path . '/' . $file;
                    if (is_file($filename)) {
                        $files[] = $filename;
                    } else {
                        $files = array_merge($files, self::scanAllFile($filename));
                    }
                }
            }
            closedir($handle);
        }
        return $files;
    }

    /**
     * 递归创建目录
     *
     * @return void
     */
    public static function createDir($path, $mode = 0755, $user = 'apache', $group = 'apache')
    {
        if (is_dir($path)) {
            return true;
        }
        return is_dir(dirname($path)) || self::createDir(dirname($path)) ? mkdir($path, $mode) && chown($path, $user) && chgrp($path, $group) : false;
    }

    /**
     * 移动文件
     *
     * @return void
     */
    public static function moveFile($file, $moveFile, $mode = 0644, $user = 'apache', $group = 'apache')
    {
        if (!file_exists($file)) {
            return false;
        }
        $movePath = dirname($moveFile);
        // return self::createDir($movePath) && rename($file, $moveFile) && chmod($moveFile, $mode) && chown($moveFile, $user) && chgrp($moveFile, $group);
        return self::createDir($movePath) && copy($file, $moveFile) && chmod($moveFile, $mode) && chown($moveFile, $user) && chgrp($moveFile, $group);
    }

    /**
     * 删除文件
     *
     * @return void
     */
    public static function unlinkFile($file)
    {
        return file_exists($file) && unlink($file);
    }
    
    
    /**
     * 删除目录
     *
     * @return void
     */
    public static function unlinkDir($path)
    {
        $path = substr($path, -1) == '/' ? $path : $path . '/';
        if (!is_dir($path)) {
            return false;
        }
        $dirHandle = opendir($path);
        while (false !== ($file = readdir($dirHandle))) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            if (!is_dir($path . $file)) {
                self::unlinkFile($path . $file);
            } else {
                self::unlinkDir($path . $file);
            }
        }
        closedir($dirHandle);
        return rmdir($path);
    }
}
