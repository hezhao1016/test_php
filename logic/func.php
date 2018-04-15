<?php
/** 函数
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 17:39
 */

//PHP 的真正威力源自于它的函数。在 PHP 中，提供了超过 1000 个内建的函数。
//函数名称以字母或下划线开头（不能以数字开头）

//无参方法
function sayHello(){
    echo "Hello!", "<br>";
}
sayHello();

// 有参方法
function saySomeThing($word){
    echo $word, "<br>";
}
saySomeThing("哈哈");

// 返回值
function calc($num1, $num2){
    return $num1 + $num2;
}
echo "1 + 2 = " . calc(1,2) . "<br>";


// 默认参数
// 默认值必须是常量表达式，不能是诸如变量，类成员，或者函数调用等。
// 注意当使用默认参数时，任何默认参数必须放在任何非默认参数的右侧；否则，函数将不会按照预期的情况工作。
function sayName($name, $age=23){
    echo "My Name is " . $name . ", I'm " . $age . " years old.<br>";
}
sayName("张三");
sayName("张三",18);
echo "<hr>";

//PHP 还允许使用数组 array 和特殊类型 NULL 作为默认参数
function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL){
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of [".join(", ", $types)."] with $device.<br>";
}
echo makecoffee();
echo makecoffee(array("cappuccino", "lavazza"), "teapot");
echo "<hr>";


//可变长度参数 5.6+
function sum(...$numbers) {
    $acc = 0;
    foreach ($numbers as $n) {
        $acc += $n;
    }
    return $acc;
}
echo sum(1, 2, 3, 4);
echo "<br>";


// 值传递 默认
function takeArray($arrays){
    $arrays[0] = 10;
    return $arrays;
}
$nums = [1, 2, 3];
print_r(takeArray($nums)); //并不会改变数组的值，这与Java不同！
echo "<br>";
print_r($nums);
echo "<hr>";


// 引用传递 参数前加 &
function takeArray2(&$arrays){
    $arrays[0] = 10;
    return $arrays;
}
$nums = [1, 2, 3];
print_r(takeArray2($nums)); //会改变数组的值
echo "<br>";
print_r($nums);
echo "<br>";

// 字符串 引用传递
function add_some_extra(&$string){
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str;
echo "<br>";

