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

// T+1
function getTPlus1()
{
    // 结算时间
    $settleTime = strtotime(date('Y-m-d 12:00:00'));
    // 如果当前时间小于今天12点就记算从上个结算日的12点后开始
    // 如果当前时间大于今天12点就已经结算从12点开始到下一个结算日
    switch (date('N')) {
        case 1:
            // 周一的上个结算是为上周周五12点
            if (NOW_TIMESTAMP <= $settleTime) {
                $settleTime = $settleTime - 259200;
            }
            break;
        
        case 2:
        case 3:
        case 4:
        case 5:
            // 周二到周五的上个结算是为昨天12点后到今天12点前
            if (NOW_TIMESTAMP <= $settleTime) {
                $settleTime = strtotime(date("Y-m-d 12:00:00", strtotime("-1 day")));
            }
            break;

        case 6:
        case 7:
            // 周六日的结算时间为周五12点后开始直到下周一的12点
            $settleTime = $settleTime - 86400 * (date('N') - 5);
            break;
    }
}
