<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 11:58
 */

//在 PHP 中有两个基本的输出方式： echo 和 print。

/*
echo 和 print 区别:
echo - 可以输出一个或多个字符串
print - 只允许输出一个字符串，返回值总为 1
提示：echo 输出的速度比 print 快， echo 没有返回值，print有返回值1。

常见的输出语句
echo(): 可以一次输出多个值，多个值之间用逗号分隔。echo是语言结构(language construct)，而并不是真正的函数，因此不能作为表达式的一部分使用。
print(): 函数print()打印一个值（它的参数），如果字符串成功显示则返回true，否则返回false。
print_r(): 可以把字符串和数字简单地打印出来，而数组则以括起来的键和值得列表形式显示，并以Array开头。但print_r()输出布尔值和NULL的结果没有意义，因为都是打印"\n"。因此用var_dump()函数更适合调试。
var_dump(): 判断一个变量的类型与长度,并输出变量的数值,如果变量有值输的是变量的值并回返数据类型。此函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。
*/


//echo
//echo 是一个语言结构，使用的时候可以不用加括号，也可以加上括号： echo 或 echo()。
echo "<h2>PHP 很有趣！</h2>";
echo("Hello World!<br/>");
echo"我要学 PHP！<br/>";
echo "这是一个", "字符串,", "使用了", "多个", "参数。";

//显示变量
$text1 = "学习 PHP";
$text2 = "RUNOOB.COM";
$cars = array("Volvo", "BMW", "Toyota");

echo "<hr/>";
echo $text1;
echo "<br/>";
echo "在 $text2 学习 PHP";
echo "<br/>";
echo "我车的品牌是 {$cars[0]}";
echo ",备用车是 ", $cars[1];


//print
//print 同样是一个语言结构，可以使用括号，也可以不使用括号： print 或 print()。
print "<hr/><h2>PHP 很有趣！</h2>";
print("Hello World!<br/>");
$count = print "我要学习 PHP！<br/>";  // 返回1
print $count;

//显示变量
$text1 = "学习 PHP";
$text2 = "RUNOOB.COM";
$cars = array("Volvo", "BMW", "Toyota");

print "<hr/>";
print $text1;
print "<br/>";
print "在 {$text2} 学习 PHP";
print "<br/>";
print "我车的品牌是 {$cars[0]}";
print ",备用车是 $cars[1]";

echo "<hr/>";
print_r($cars);
print "<br/>";
print_r($text1);
echo "<hr/>";
print_r(true);
print_r(null);

echo "<hr/>";
var_dump($cars);
print "<br/>";
var_dump($text1);

