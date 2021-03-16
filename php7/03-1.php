<?php
echo '时间函数<br>';
//函数解决时差,或者php.ini 修改date.timeZone
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set('asia/Tokyo');
}
echo date("Y-m-d H:i:s");

echo '<br>验证时间日期的合法性<br>';
if (checkdate(2, 3, 2018)) {
    echo '合法';
} else {
    echo '不合法';
}
//获取 到2030-1-1 还差多少天
$nowTime = time();//获取当前时间
$endTime = strtotime('2021-01-01 00:00:00');
echo floor(($endTime - $nowTime) / 3600 / 24);
echo '<br>2小时后:<br>';

print(date("Y-m-d H:i:s", mktime(date('H') + 2)));

echo '<br>Unix时间戳和微秒数,常用与文件上传:<br>';
$mtime = explode(' ', microtime());
//echo microtime();
//print_r ($mtime);
$startTime = $mtime[1] + $mtime[0];
echo floor($startTime);
echo '<br>';


function getTime($endTime)
{
    $bTime = time();
    $chaTime = strtotime($endTime) - $bTime;//获取到相差的天数 单位s

//    获取天
    $day0 = $chaTime / 3600 / 24; //  10.1111
    $day = floor($day0)<=0?0:floor($day0);    // 10

//    获取时
    $hour0 = ($day0 - $day) * 24;
    $hour = floor($hour0)<=0?0:floor($hour0) ;
//    获取分
    $minute0 = ($hour0 - $hour) * 60;
    $minute = floor($minute0)<=0?0:floor($minute0);
    //    获取秒
    $second0 = ($minute0 - $minute) * 60;
    $second = floor($second0)<=0?0:floor($second0);

    return "距离" . $endTime . "还差" . $day . "天" . $hour . "小时" . $minute . "分" . $second . "秒!";
}

echo getTime('2020-12-30 00:00:00');