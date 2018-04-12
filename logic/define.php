<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 16:22
 */

/*
PHP 常量
常量是一个简单值的标识符。该值在脚本中不能改变。
一个常量由英文字母、下划线、和数字组成,但数字不能作为首字母出现。 (常量名不需要加 $ 修饰符)。
注意： 常量在整个脚本中都可以使用。

设置常量，使用 define() 函数，函数语法如下：
bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
该函数有三个参数:
name：必选参数，常量名称，即标志符。
value：必选参数，常量的值。
case_insensitive ：可选参数，如果设置为 TRUE，该常量则大小写不敏感。默认是大小写敏感的。
*/

// 区分大小写的常量名
define("GREETING", "欢迎访问 Runoob.com");
echo GREETING, "<br>";
echo greeting, "<br>";

// 不区分大小写的常量名
echo '<p>------------------------</p>';
define("GREETING", "欢迎访问 Runoob.com", true);
echo GREETING, "<br>";
echo greeting, "<br>";


//在函数内使用常量
function myTest() {
    echo GREETING;
}
echo '<p>------------------------</p>';
myTest();


echo '<p>------------常量数组------------</p>';
// 使用 const 函数来定义数组
const arrs = ["a","b","c"];
print_r(arrs);
echo "<br>";

//在 PHP 5.6 中仅能通过 const 定义常量数组，PHP 7 可以通过 define() 来定义。
// 使用 define 函数来定义数组
define('sites', [
    'Google',
    'Runoob',
    'Taobao'
]);

print_r(sites);