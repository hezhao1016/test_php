<?php
/** 运算符
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 17:53
 */

//- 取反
//.	并置

$x = 10;
$y = 6;
echo ($x + $y); // 输出16
echo '<br>'; 

echo ($x - $y); // 输出4
echo '<br>'; 

echo ($x * $y); // 输出60
echo '<br>'; 

echo ($x / $y); // 输出1.6666666666667
echo '<br>'; 

echo ($x % $y); // 输出4
echo '<br>'; 

echo -$x;

//PHP7+ 版本新增整除运算符 intdiv()
echo '<br>';
var_dump(intdiv(10, 3));


//赋值运算符
/*
x = y	x = y	    左操作数被设置为右侧表达式的值
x += y	x = x + y	加
x -= y	x = x - y	减
x *= y	x = x * y	乘
x /= y	x = x / y	除
x %= y	x = x % y	模（除法的余数）
a .= b	a = a . b	连接两个字符串
*/

$x=10;
echo $x; // 输出10
echo '<br>';

$y=20;
$y += 100;
echo $y; // 输出120
echo '<br>';

$z=50;
$z -= 25;
echo $z; // 输出25
echo '<br>';

$i=5;
$i *= 6;
echo $i; // 输出30
echo '<br>';

$j=10;
$j /= 5;
echo $j; // 输出2
echo '<br>';

$k=15;
$k %= 4;
echo $k; // 输出3
echo '<br>';


$a = "Hello";
$b = $a . " world!";
echo $b; // 输出Hello world!
echo '<br>';

$x="Hello";
$x .= " world!";
echo $x; // 输出Hello world!
echo '<br>';


// 递增/递减运算符
/*
++ x	预递增	x 加 1，然后返回 x
x ++	后递增	返回 x，然后 x 加 1
-- x	预递减	x 减 1，然后返回 x
x --	后递减	返回 x，然后 x 减 1
*/

$x=10;
echo ++$x; // 输出11
echo '<br>';

$y=10;
echo $y++; // 输出10
echo '<br>';

$z=5;
echo --$z; // 输出4
echo '<br>';

$i=5;
echo $i--; // 输出5
echo '<br>';


//比较运算符
/*
x == y	    等于	    如果 x 等于 y，则返回 true	                    5==8 返回 false
x === y	    绝对等于	如果 x 等于 y，且它们类型相同，则返回 true	    5==="5" 返回 false
x != y	    不等于	    如果 x 不等于 y，则返回 true	                5!=8 返回 true
x <> y	    不等于	    如果 x 不等于 y，则返回 true	                5<>8 返回 true
x !== y	    绝对不等于	如果 x 不等于 y，或它们类型不相同，则返回 true	5!=="5" 返回 true
x > y	    大于	    如果 x 大于 y，则返回 true	                    5>8 返回 false
x < y	    小于	    如果 x 小于 y，则返回 true	                    5<8 返回 true
x >= y	    大于等于	如果 x 大于或者等于 y，则返回 true	            5>=8 返回 false
x <= y	    小于等于	如果 x 小于或者等于 y，则返回 true	            5<=8 返回 true
*/

$x=100;
$y="100";

var_dump($x == $y);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x !== $y);
echo "<br>";

$a=50;
$b=90;

var_dump($a > $b);
echo "<br>";
var_dump($a < $b);


//逻辑运算符
/*
x and y	    与	    如果 x 和 y 都为 true，则返回 true
x or y	    或	    如果 x 和 y 至少有一个为 true，则返回 true
x xor y	    异或	如果 x 和 y 有且仅有一个为 true，则返回 true
x && y	    和and类似,优先级大于and
x || y	    和or类似,优先级大于or
! x	        非	   如果 x 不为 true，则返回 true
*/
$x = 6;
$y = 3;
echo "<hr>";
var_dump($x < 10 and $y > 1);
echo "<br>";
var_dump($x < 10 && $y > 1);
echo "<br>";
var_dump($x == 6 or $y == 5);
echo "<br>";
var_dump($x == 6 || $y == 5);
echo "<br>";
var_dump($x == 6 xor $y == 3);
echo "<br>";
var_dump(!($x == $y));
echo "<br>";

//运算符优先级中，or 和 ||，&& 和 and 都是逻辑运算符，效果一样，但是其优先级却不一样。
echo '<hr>';
// 优先级： &&  >  =  >  and
// 优先级： ||  >  =  >  or
$a = 3;
$b = false;
$c = $a or $b;
var_dump($c);  // 这里的 $c 为 int 值3，而不是 boolean 值 true
$d = $a || $b;
var_dump($d);  //这里的 $d 就是 boolean 值 true


//数组运算符
$x = array("a" => "red", "b" => "green");
$y = array("c" => "red", "d" => "green");
$z = $x + $y; // $x 和 $y 数组合并
$copy = $x;
echo "<hr>";
var_dump($z);
echo "<br>";
var_dump($x == $y);
echo "<br>";
var_dump($x == $copy);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x <> $y);
echo "<br>";
var_dump($x !== $y);


//三元运算符
// (expr1) ? (expr2) : (expr3)
//自 PHP 5.3 起，可以省略三元运算符中间那部分。表达式 expr1 ?: expr3 在 expr1 求值为 TRUE 时返回 expr1，否则返回 expr3。
echo "<hr/>";
$test = '菜鸟教程';
// 普通写法
$username = isset($test) ? $test : 'nobody';
echo $username, PHP_EOL; //换行符

// PHP 5.3+ 版本写法
$username = $test ?: 'nobody';
echo $username, PHP_EOL;


//在 PHP7+ 版本多了一个 NULL 合并运算符 ??
// NULL 合并运算符会判断变量是否存在且值不为NULL,如果 $_GET['user'] 不存在返回 'nobody'，否则返回 $_GET['user'] 的值
$username = $_GET['user'] ?? 'nobody';
echo $username, PHP_EOL;
// 类似的三元运算符
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';


//组合比较符(PHP7+)
//PHP7 新增加的太空船运算符（组合比较符）用于比较两个表达式 $a 和 $b，如果 $a 小于、等于或大于 $b时，它分别返回-1、0或1。
// 整型
echo '<hr>';
echo 1 <=> 1 , '<br/>'; // 0
echo 1 <=> 2 , '<br/>'; // -1
echo 2 <=> 1 , '<br/>'; // 1

// 浮点型
echo 1.5 <=> 1.5 , '<br/>'; // 0
echo 1.5 <=> 2.5 , '<br/>'; // -1
echo 2.5 <=> 1.5 , '<br/>'; // 1

// 字符串
echo "a" <=> "a" , '<br/>'; // 0
echo "a" <=> "b" , '<br/>'; // -1
echo "b" <=> "a" , '<br/>'; // 1


// 括号优先运算
echo '<hr>';
$a = 1;
$b = 2;
$c = 3;
$d = $a + $b * $c;
echo $d;
echo "\n";
$e = ($a + $b) * $c;  // 使用括号
echo $e;
echo "\n";

# instanceof 用于确定一个 PHP 变量是否属于某一类 class 的实例，包括父类
