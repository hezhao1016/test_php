<?php
/** 过滤器
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/27 0:35
 */

/*
函数和过滤器
filter_var()        通过一个指定的过滤器来过滤单一的变量
filter_var_array()  通过相同的或不同的过滤器来过滤多个变量
filter_input        获取一个输入变量，并对它进行过滤
filter_input_array  获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
filter_has_var()	检查是否存在指定输入类型的变量
// 不常用
filter_id()	        返回指定过滤器的 ID 号
filter_list()	    返回包含所有得到支持的过滤器的一个数组

有两种过滤器：Validating 和 Sanitizing
Validating 过滤器：
    用于验证用户输入
    严格的格式规则（比如 URL 或 E-Mail 验证）
    如果成功则返回预期的类型，如果失败则返回 FALSE
Sanitizing 过滤器：
    用于允许或禁止字符串中指定的字符
    无数据格式规则
    始终返回字符串
*/

// filter_var()
$i = "123a";
if(!filter_var($i, FILTER_VALIDATE_INT)){
    echo "不是一个合法的整数<br>";
} else {
    echo "是个合法的整数<br>";
}

//选项和标志
$var = 300;
$int_options = array(
    "options"=>array(
        "min_range"=>0,
        "max_range"=>256
    )
);
if(!filter_var($var, FILTER_VALIDATE_INT, $int_options)) {
    echo "变量值不在合法范围内<br>";
} else {
    echo "变量值在合法范围内<br>";
}

//验证输入
if(!filter_has_var(INPUT_GET, "email")) {
    echo("没有 email 参数<br>");
} else {
    if (!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL)) {
        echo "不是一个合法的 E-Mail<br>";
    } else {
        echo "是一个合法的 E-Mail<br>";
    }
}

//净化输入
if(!filter_has_var(INPUT_GET, "url")) {
    echo "没有 url 参数<br>";
} else {
    // FILTER_SANITIZE_URL 删除所有字符，除了字母、数字以及 $-_.+!*'(),{}|\^~[]`<>#%";/?:@&=
    $url = filter_input(INPUT_GET, "url", FILTER_SANITIZE_URL);
    echo $url . "<br>";
}

//过滤多个输入
$filters = array(
    "name" => array(
        "filter"=>FILTER_SANITIZE_STRING
    ),
    "age" => array(
        "filter"=>FILTER_VALIDATE_INT,
        "options"=>array(
            "min_range"=>1,
            "max_range"=>120
        )
    ),
    "email"=> FILTER_VALIDATE_EMAIL
);

$result = filter_input_array(INPUT_GET, $filters);

//filter_input_array() 函数的第二个参数可以是数组或单一过滤器的 ID。
//如果该参数是单一过滤器的 ID，那么这个指定的过滤器会过滤输入数组中所有的值。
//如果该参数是一个数组，那么此数组必须遵循下面的规则：
//    必须是一个关联数组，其中包含的输入变量是数组的键（比如 "age" 输入变量）
//    此数组的值必须是过滤器的 ID ，或者是规定了过滤器、标志和选项的数组

if (!$result["age"]) {
    echo("年龄必须在 1 到 120 之间。<br>");
} else if(!$result["email"]) {
    echo("E-Mail 不合法<br>");
} else {
    echo("输入正确<br>");
}


//使用 Filter Callback ， 自定义过滤器
function convertSpace($string) { // 可以创建自己的自定义函数，也可以使用已存在的 PHP 函数
    return str_replace("_", ".", $string);
}
$string = "www_runoob_com!";
// 指定的函数必须存入名为 "options" 的关联数组中
echo filter_var($string, FILTER_CALLBACK, array("options" => "convertSpace"));
