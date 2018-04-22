<?php
/** 日期
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/22 23:15
 */

//设置当前时区为中国，默认格林威治标准时间
date_default_timezone_set(PRC);

/*
date() 函数可把时间戳格式化为可读性更好的日期和时间。
string date ( string $format [, int $timestamp ] )
    format	必需。规定时间戳的格式。
    timestamp	可选。规定时间戳。默认是当前的日期和时间。

列出了一些可用的字符：
        d - 代表月中的天 (01 - 31)
        m - 代表月 (01 - 12)
        Y - 代表年 (四位数)
*/

echo date("Y 年 m 月 d 日 H 点 i 分 s 秒  星期N") . "<br>";
echo date("Y/m/d") . "<br>";
echo date("Y-m-d",date_timestamp_get(date_create("2012-01-01"))) . "<br>";


//返回一个DateTime 对象
$date = date_create("2013-03-15");
//格式化日期
echo date_format($date,"Y/m/d") . "<br>";

//返回 Unix 时间戳。
$date = date_create();
echo date_timestamp_get($date) . "<br>";

//返回当前时间的 Unix 时间戳
echo time() . "<br>";

//返回当前本地的日期/时间的日期/时间信息
print_r(getdate());
echo "<br>";
print_r(getdate(date_timestamp_get(date_create("2012-01-01 22:22:11"))));

//返回当前时间
print_r(gettimeofday());
echo "<br>";
echo gettimeofday(true), "<br>";

//将任何字符串的日期时间描述解析为 Unix 时间戳
$time = strtotime("2018-01-18 08:08:08");  // 将指定日期转成时间戳
echo  $time, "<br>";
echo strtotime("now"), "<br>";
echo strtotime("10 September 2000"), "<br>";
echo strtotime("+1 day"), "<br>";
echo strtotime("+1 week"), "<br>";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "<br>";
echo strtotime("next Thursday"), "<br>";
echo strtotime("last Monday"), "<br>";

//添加日、月、年、时、分和秒到一个日期
$date = date_create("2013-03-15");
date_add($date,date_interval_create_from_date_string("40 days"));
echo date_format($date,"Y-m-d") . "<br>";

//从指定日期减去日、月、年、时、分和秒
$date = date_create("2013-03-15");
date_sub($date,date_interval_create_from_date_string("40 days"));
echo date_format($date,"Y-m-d") . "<br>";

//返回两个 DateTime 对象间的差值。
$date1 = date_create("2013-03-15");
$date2 = date_create("2013-12-12");
$diff = date_diff($date1,$date2);
var_dump($diff);
echo "<br>";

//计算两个日期间的间隔，然后格式化时间间隔
echo $diff->format("日期间隔的总天数为： %a 天。"); // %a 输出两个日期间隔的总天数