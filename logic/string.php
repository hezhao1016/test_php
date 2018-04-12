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
