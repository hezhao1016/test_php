<?php
/** 数据类型转换
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 18:57
 */

//自动转换
$foo = "1";  // $foo 是字符串 (ASCII 49)
var_dump($foo);
$foo *= 2;   // $foo 现在是一个整数 (2)
var_dump($foo);
$foo = $foo * 1.3;  // $foo 现在是一个浮点数 (2.6)
var_dump($foo);
$foo = 5 * "10 Little Piggies"; // $foo 是整数 (50)
var_dump($foo);
$foo = 5 * "10 Small Pigs";     // $foo 是整数 (50)
var_dump($foo);
echo "<hr>";

/*
PHP数据类型有四种转换方式：
1.在要转换的变量之前加上用括号括起来的目标类型
2.使用3个具体类型的转换函数，intval()、floatval()、strval()
3.使用通用类型转换函数settype(mixed var,string type)

使用强制类型转换将字符串转化为整数速度是最快的。
*/

//第一种转换方式： (int)  (bool)  (float)  (string)  (array) (object)
$num1 = 3.14;
$num2 = (int)$num1;
var_dump($num1); //输出float(3.14)
var_dump($num2); //输出int(3)
echo "<hr>";


//第二种转换方式：  intval()  floatval()  strval()
$str = "123.9abc";
$int = intval($str);     //转换后数值：123
$float = floatval($str); //转换后数值：123.9
$str = strval($float);   //转换后字符串："123.9"
var_dump($int);
var_dump($float);
var_dump($str);
echo "<hr>";


//第三种转换方式：  settype()
$num4 = 12.8;
$flg = settype($num4,"int");
var_dump($flg);  //输出bool(true)
var_dump($num4); //输出int(12)
echo "<hr>";
