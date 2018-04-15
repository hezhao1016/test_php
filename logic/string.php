<?php
/** 字符串操作
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 16:35
 */

//并置操作符 用于把两个字符串值连接起来。
$txt1 = "Hello World! ";
$txt2 = "What a nice day!";
echo $txt1 . $txt2;


//strlen()函数 ,获取字符串长度
echo "<br>";
echo strlen("Hello");
echo "<br>";
echo strlen("中文字符");   // 输出 12，因为一个中文占 3 个字符数。
echo "<br>";
echo mb_strlen("中文字符",'utf-8');  // 输出 4，使用 mb_strlen 设置指定编码输出中文字符个数


//strpos()函数，大小写敏感,在字符串中查找一个字符。如果找到匹配，返回第一个匹配字符的位置，如果未找到，返回false
echo "<br>";
echo strpos("Hello, World!", "or");
echo "<br>";
echo strpos("你好!！a" ,"!");// 输出 6, 中文字符在 UTF-8 下是 3 个字符长度，在 gbk 下是2个字符长度。
echo "<br>";
echo mb_strpos("你好!！a" ,"!");// 正确

echo "<br>";
echo stripos("Hello, World!", "oR"); //大小写不敏感
echo "<br>";
echo stristr("Hello, World!", "oR"); //大小写不敏感,返回从找到的字符串到结尾
echo "<br>";
echo stristr("Hello, World!", "oR",true); //大小写不敏感,返回从开始到找到的字符串


//stripos()	返回字符串在另一字符串中第一次出现的位置（大小写不敏感）。
//stristr()	查找字符串在另一字符串中第一次出现的位置（大小写不敏感）。
//strpos()	返回字符串在另一字符串中第一次出现的位置（大小写敏感）。
//strripos()查找字符串在另一字符串中最后一次出现的位置(大小写不敏感)。
//strrpos()	查找字符串在另一字符串中最后一次出现的位置(大小写敏感)。

//相应的，中文的操作函数有：
//mb_stripos()、mb_stristr()、mb_strpos()、mb_strripos()、mb_strrpos() ...


// 截取字符串
echo "<br>";
echo substr('Hello,World',2);
echo "<br>";
echo substr('你好世界',2,2); //截取中文会乱码，因为中文占3个长度
echo "<br>";
echo mb_substr('你好世界',2,2); //正确


// 去除空格
echo "<br>";
echo trim(" a b c   ");
echo "<hr>";


// 比较字符串
//PHP中，可以用双等号（==）或 三等号（===）来比较字符串。
//二者的区别是：双等号不比较类型，三等号会比较类型，但不转换类型；
//用双等号进行比较时，如果等号左右两边有数字类型的值，刚会把另一个值转化为数字，然后进行比较。
//如果是纯字符串或者NULL时，会转化为0进行比较。同样，大小于号也和等号一样，比较时可能出现不正确的结果。

var_dump( "A" == "A" ); echo "<br>";
var_dump( "0" == "A" ); echo "<br>";
var_dump( 0 == "A" ); echo "<br>";
var_dump( 0 === "A" ); echo "<hr>";

//比较字符串可以用PHP的自带函数strcmp和strcasecmp。其中strcasecmp是strcmp的变种，它会先把字符串转化为小写再进行比较
//等于则返回0、大于则返回1、小于则返回-1

var_dump(strcmp('A','A')); echo "<br>";
var_dump(strcmp('0','A')); echo "<br>";
var_dump(strcmp(0,'A')); echo "<br>";
var_dump(strcmp('a','A')); echo "<br>";
var_dump(strcasecmp('a','A')); echo "<br>";

