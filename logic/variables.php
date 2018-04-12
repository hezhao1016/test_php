<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-11 18:19
 */

/*
PHP 变量规则：
变量以 $ 符号开始，后面跟着变量的名称
变量名必须以字母或者下划线字符开始
变量名只能包含字母数字字符以及下划线（A-z、0-9 和 _ ）
变量名不能包含空格
变量名是区分大小写的（$y 和 $Y 是两个不同的变量）
*/

$text1 = "Hello World!";
$text2 = 'Hello，World!';
$num = 1;
$floatNum = 1.10;
$bool = true;

/*
PHP 有四种不同的变量作用域：
local
global
static
parameter

在所有函数外部定义的变量，拥有全局作用域。
除了函数外，全局变量可以被脚本中的任何部分访问，要在一个函数中访问一个全局变量，需要使用 global 关键字。
在 PHP 函数内部声明的变量是局部变量，仅能在函数内部访问
*/


//局部和全局作用域
$x = 5; // 全局变量
function myTest()
{
    $y = 10;
    echo "<p>测试函数内变量</p>";
    echo "变量x 为: $x"; // 无法输出， 如果要在一个函数中访问一个全局变量，必须使用 global 关键字。
    echo "<br/>";
    echo "变量y 为: $y";
}

myTest();
echo "<p>测试函数外变量</p>";
echo "变量x 为: $x";
echo "<br/>";
echo "变量y 为: $y"; // 局部变量无法访问

echo "<br/><hr/><br/>";



// global 关键字
$x = 5;
$y = 10;

function myTest_global()
{
    global $x, $y;
    $y += $x;
}

myTest_global();
echo "myTest_global:$y<br/>";


//PHP 将所有全局变量存储在一个名为 $GLOBALS[index] 的数组中。 index 保存变量的名称。这个数组可以在函数内部访问，也可以直接用来更新全局变量。
//上面的实例可以写成这样：

$x = 5;
$y = 10;

function myTest_GLOBALS()
{
    $GLOBALS['y'] += $GLOBALS["x"];
}

myTest_GLOBALS();
echo "myTest_GLOBALS:$y<br/><hr/>";



//Static 作用域 | 使用static修饰的变量在执行完之后不会清除掉
function myTest_static()
{
    static $x = 0;
    echo "$x<br/>";
    $x++;
}

myTest_static();
myTest_static();
myTest_static();
//然后，每次调用该函数时，该变量将会保留着函数前一次被调用时的值。
//注释：该变量仍然是函数的局部变量。



//参数作用域
function myTest_param($x)
{
    echo "<hr/>$x";
}

myTest_param(9);


