<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 18:37
 */

date_default_timezone_set(PRC); //设置当前时区为中国，默认格林威治标准时间
echo "当前时间：", date("Y-m-d H:i:s") , "<br>";

$hour = (int)date("H"); // 获取当前的小时值

if($hour < 10) {
    echo "早上好,现在是{$hour}点", "<br>";
} elseif ($hour < 14){ // elseif 和 else if 完全同效果，elseif 是 PHP 为 else if 专门做到容错版。更准确更严格到写法为后者: else if
    echo "中午好,现在是{$hour}点", "<br>";
} else {
    echo "晚上好,现在是{$hour}点", "<br>";
}
