<?php
function amount_lower2upper() {

    $amount = (int)$amount;
    // 分割金额的整数和小数
    $parts = explode('.', $amount, 2);
    $int   = isset($parts[0]) ? strval($parts[0]) : '0';
    $dec   = isset($parts[1]) ? strval($parts[1]) : '';

    // 小数后大于两位，不做四舍五入就直接截取
    $decLen = strlen($dec);
    if ($decLen > 2) {
        $dec = $isRound 
            ? substr(strrchr(strval(round(floatval("0.".$dec), 2)), '.'), 1)
            : substr($dec, 0, 2);
    }

    if (empty($int) && empty($dec)) {
        return '零' . $unit . '整';
    }

    $chs = array('0','壹','贰','叁','肆','伍','陆','柒','捌','玖'); 
    $uni = array('','拾','佰','仟'); 
    $decUni = array('角', '分'); 
    $exp = array('', '万'); 
    $res = ''; 
 
    // 整数部分从右向左找 
    for($i = strlen($int) - 1, $k = 0; $i >= 0; $k++) 
    { 
        $str = ''; 
        // 按照中文读写习惯，每4个字为一段进行转化，i一直在减 
        for($j = 0; $j < 4 && $i >= 0; $j++, $i--) 
        { 
            $u = $int{$i} > 0 ? $uni[$j] : ''; // 非0的数字后面添加单位 
            $str = $chs[$int{$i}] . $u . $str; 
        } 
        $str = rtrim($str, '0');// 去掉末尾的0 
        $str = preg_replace("/0+/", "零", $str); // 替换多个连续的0 
        if(!isset($exp[$k])) 
        { 
            $exp[$k] = $exp[$k - 2] . '亿'; // 构建单位 
        } 
        $u2 = $str != '' ? $exp[$k] : ''; 
        $res = $str . $u2 . $res; 
    }
 
    // 如果小数部分处理完之后是00，需要处理下 
    $dec = rtrim($dec, '0'); 
 
    // 小数部分从左向右找 
    if(!empty($dec)) 
    {
        if (!empty($res)) {
            $res .= $unit; 
        }
 
        // 是否要在整数部分以0结尾的数字后附加0，有的系统有这要求 
        if ($isExtraZero) 
        { 
            if (substr($int, -1) === '0') 
            { 
                $res.= '零'; 
            } 
        } 
 
        for($i = 0, $cnt = strlen($dec); $i < $cnt; $i++) 
        { 
            $u = $dec{$i} > 0 ? $decUni[$i] : ''; // 非0的数字后面添加单位 
            $res .= $chs[$dec{$i}] . $u; 
        } 
        $res = rtrim($res, '0');// 去掉末尾的0 
        $res = preg_replace("/0+/", "零", $res); // 替换多个连续的0 
    } 
    else 
    { 
        $res .= $unit . '整'; 
    } 
    return $res; 
}
