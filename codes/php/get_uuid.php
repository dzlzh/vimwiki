<?php
/**
 * 生成 UUID
 * @access public
 * @param bool [$braces]
 * @return string
 */
function getUUID($braces = false)
{
    if (function_exists('com_create_guid')) {
        $uuid = com_create_guid();
    } else {
        mt_srand((double)microtime()*10000); // optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);
        $uuid   = chr(123)
            .substr($charid, 0, 8)  . $hyphen
            .substr($charid, 8, 4)  . $hyphen
            .substr($charid, 12, 4) . $hyphen
            .substr($charid, 16, 4) . $hyphen
            .substr($charid, 20, 12). chr(125);
    }
    $uuid = $braces ? $uuid : trim($uuid, '{}');
    return $uuid;
}
