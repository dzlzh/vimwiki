<?php

// 根据指定日期与1~7周几来获取对应的那周的日期

function getWeekDay($date = '', $weekday = 1, $format = 'Y-m-d')
{
    $time = strtotime($date);
    $time = $time ?: time();
    return date($format, $time - 86400 * (date('N', $time) - $weekday));
}

// 根据指定日期与01~31号来获取对应的那月的日期

function getMonth($date = '', $format = 'Y-m-01')
{
    $time = strtotime($date);
    $time = $time ?: time();
    return date($format, $time);
}
