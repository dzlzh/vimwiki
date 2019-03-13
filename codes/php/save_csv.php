<?php

/**
 * 保存为 .csv 文件
 * @param array $header 头部标题
 * @param array $content 内容
 * @param string $fileName 文件名称
 *
 * @return string
 */
function saveCsv($header, $content, $fileName)
{
    $fileName .= '.csv';
    // 打开文件资源，不存在则创建
    $fp = fopen($fileName, 'a');

    // 处理头部标题
    fputcsv($fp, $header);

    // 处理内容
    foreach ($content as $row) {
        fputcsv($fp, $row);
    }

    // 关闭资源
    fclose($fp);
    return $fileName;
}
