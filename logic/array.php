<?php
/** 数组
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 11:44
 */

/*
在 PHP 中，array() 函数用于创建数组：

在 PHP 中，有三种类型的数组：
数值数组 - 带有数字 ID 键的数组
关联数组 - 带有指定的键的数组，每个键关联一个值
多维数组 - 包含一个或多个数组的数组

PHP数组没有泛型
*/

//数值数组
$arrs = array("A", 2, 2.0, true, null);
$arrs[1] = "Add1";
$arrs[] = "Add_End"; // 插入到数组最后一位
print_r($arrs);
echo "<br>";

//自 5.4 起可以使用短数组定义语法，用 [] 替代 array()
$arrs = ["A", 2, 2.0, true];
print_r($arrs);
echo "<br>";

// 获取数组长度
echo count($arrs);
echo "<hr>";

//遍历数组
for($i = 0; $i< count($arrs); $i++) {
    echo $arrs[$i] . " ";
}
echo "<hr>";

foreach ($arrs as $key => $value) {
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";
}
echo "<hr>";


//关联数组 键值对
$age = array("Bob" => 22, "Frank" => "18");
$age["Jack"] = 20;
print_r($age);
echo "<hr>";

//遍历键值对数组
/*
foreach 语法结构提供了遍历数组的简单方式。foreach 仅能够应用于数组和对象，如果尝试应用于其他数据类型的变量，或者未初始化的变量将发出错误信息。有两种语法：
foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement
*/
foreach ($age as $key => $value) {
    echo "Key=" . $key . ", Value=" . $value;
    echo "<br>";
}

echo "<hr>";
foreach ($age as $value) {
    echo "Value=" . $value;
    echo "<br>";
}


//多维数组
echo "<hr>";
//多维数组里可以包含数组，也可以包含字符串或者其他类型
$cars = [
    "学生信息",
    ["张三","1"],
    ["李四","2"],
    ["王五","3"]
];
print_r($cars);

echo "<hr>";
// 键值对数组、数值数组可以混用
$sites = [
    "sites",
    "baidu" => [
        "百度",
        "https://www.baidu.com"
    ],
    "gitee" => [
        "siteName" => "码云",
        "url" => "https://gitee.com"
    ]
];
print("<pre>"); // 格式化输出数组
print_r($sites);
print("</pre>");

echo $sites['baidu'][0] . '地址为：' . $sites['baidu'][1];
echo "<br>";
echo $sites['gitee']['siteName'] . '地址为：' . $sites['gitee']['url'];