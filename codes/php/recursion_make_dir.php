<?php

/**
 * 递归创建目录
 * @param string $filePath 文件路径
 *
 * @return bool
 */
function makeDir($filePath)
{
    // 目录存在返回 ture
    if (is_dir($filePath)) {
        return true;
    }
    // 父目录存在 或 递归找到父目录，创建目录
    return is_dir(dirname($filePath)) || makeDir(dirname($filePath))
        ? mkdir($filePath)
        : false;
}
