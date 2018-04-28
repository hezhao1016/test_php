<?php
/** 匿名函数/闭包函数
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-28 19:35
 */

// 匿名函数示例
echo preg_replace_callback('~-([a-z])~', function ($match) {
        return strtoupper($match[1]);
}, 'hello-world') . "<br>"; // 输出 helloWorld

// 匿名函数变量赋值示例
//闭包函数作为变量的值来使用。PHP 会自动把此种表达式转换成内置类 Closure 的对象实例，结尾要加分号
$nimingFunc = function ($name){
    echo "匿名函数被调用 [$name] <br>";
};
$nimingFunc("Horace");

//http://www.php.net/manual/zh/functions.anonymous.php
//https://www.cnblogs.com/iforever/p/6439852.html