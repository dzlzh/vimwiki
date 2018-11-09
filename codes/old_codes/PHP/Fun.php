<?php
/**
 *  +--------------------------------------------------------------
 *  | Copyright (c) 2017 DZLZH All rights reserved.
 *  +--------------------------------------------------------------
 *  | Author: DZLZH <dzlzh@null.net>
 *  +--------------------------------------------------------------
 *  | Filename: Fun.php
 *  +--------------------------------------------------------------
 *  | Last modified: 2017-04-07 15:40
 *  +--------------------------------------------------------------
 *  | Description: 
 *  +--------------------------------------------------------------
 */


/**
 * Class Fun
 */
class Fun
{
    /**
     * xml 转数组
     *
     * @return array
     */
    public static function xml2arr($node)
    {
        $array = false;
        if ($node->hasAttributes()) {
            foreach ($node->attributes as $attr) {
                $array[$attr->nodeName] = $attr->nodeValue;
            }
        }
        if ($node->hasChildNodes()) {
            if ($node->childNodes->length == 1) {
                $array[$node->firstChild->nodeName] = self::xml2arr($node->firstChild);
            } else {
                foreach ($node->childNodes as $childNode) {
                    if ($childNode->nodeType != XML_TEXT_NODE) {
                        $array[$childNode->nodeName][] = self::xml2arr($childNode);
                    }
                }
            }
        } else {
            return $node->nodeValue;
        }
        return $array;
    }

    /**
     * 生成随机名字
     *
     * @return string
     */
    public static function randomName($len)
    {
        $chars = 'ABCDEFGHJKMNPQRSTWXYZabcdefhijkmnprstwxyz2345678';
        $maxPos = strlen($chars) - 1;
        $pwd = '';
        for ($i = 0; $i < $len; $i++) {
            $pwd .= $chars[mt_rand(0, $maxPos)];
        }
        return $pwd;
    }

    /**
     * 字符编码转换
     *
     * @return string
     */
    public static function transcode($str)
    {
        $encode = mb_detect_encoding($str, array('ASCII', 'UTF-8', 'GB2312', 'GBK'));
        $str = $encode == 'UTF-8' ? mb_convert_encoding($str, 'GBK', 'UTF-8') : $str;
        return $str; 
    }

    /**
     * 生成 UUID
     *
     * @return string
     */
    public static function getUUID($case = false, $hyphen = false, $braces = false)
    {
        if (function_exists('com_create_guid')){
            $uuid = $braces ? com_create_guid() : trim(com_create_guid(), '{}');
        }else{
            mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
            $charid = strtoupper(md5(uniqid(mt_rand(), true)));
            //123-"{", 125-"}", 45-"-"
            $hyphen = $hyphen ? chr(45) : '';
            $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
            $uuid = $braces ? chr(123) . $uuid . $chr(125) : $uuid;
        }
        return $case ? $uuid : strtolower($uuid);
    }
    
}
