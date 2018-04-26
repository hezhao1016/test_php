<?php
/** 高级过滤器
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/27 1:06
 */

//检测一个数字是否在一个范围内
$int = 122;
$min = 1;
$max = 200;
$options = array("options" => array("min_range"=>$min, "max_range"=>$max));
if (!filter_var($int, FILTER_VALIDATE_INT, $options)) {
    echo("变量值不在合法范围内<br>");
} else {
    echo("变量值在合法范围内<br>");
}

//检测 IPv6 地址
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";
if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    echo("$ip 是一个 IPv6 地址<br>");
} else {
    echo("$ip 不是一个 IPv6 地址<br>");
}

//检测 URL - 必须包含QUERY_STRING（查询字符串）
$url = "http://www.runoob.com";
if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED)) {
    echo("$url 是一个合法的 URL<br>");
} else {
    echo("$url 不是一个合法的 URL<br>");
}

//移除 ASCII 值大于 127 的字符 , 同样它也能移除 HTML 标签
$str = "<h1>Hello WorldÆØÅ!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr . "<br>";