<?php
/** PHP 错误处理
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-26 10:41
 */

// 获取所有PHP配置信息
//print("<pre>");
//print_r(ini_get_all());
//print("</pre>");

// 手动开启日志输出
ini_set("display_errors", "On");
error_reporting(E_ALL);


/*
在 PHP 中，默认的错误处理很简单。一条错误消息会被发送到浏览器，这条消息带有文件名、行号以及描述错误的消息。
错误处理方法：
    简单的 "die()" 语句
    自定义错误和错误触发器
    错误报告
*/

// die()
/*
if(!file_exists("xxx.txt")){
    die("文件不存在"); // 终止脚本
    echo "这条代码不会执行到";
}else{
    $file = fopen("xxx.txt","r");
    echo "已打开文件，请进行具体操作！<br>";
}
*/


// 自定义错误处理器函数必须有能力处理至少两个参数 (error_level 和 error_message)，但是可以接受最多五个参数（可选的：error_file, error_line 和 error_context）
//    error_level	必需。为用户定义的错误规定错误报告级别。必须是一个数字。参见下面的表格：错误报告级别。
//    error_message	必需。为用户定义的错误规定错误消息。
//    error_file	可选。规定错误发生的文件名。
//    error_line	可选。规定错误发生的行号。
//    error_context	可选。规定一个数组，包含了当错误发生时在用的每个变量以及它们的值。

//错误报告级别
//2	    E_WARNING	        非致命的 run-time 错误。不暂停脚本执行。
//8	    E_NOTICE	        run-time 通知。在脚本发现可能有错误时发生，但也可能在脚本正常运行时发生。
//256	E_USER_ERROR	    致命的用户生成的错误。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_ERROR。
//512	E_USER_WARNING	    非致命的用户生成的警告。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_WARNING。
//1024	E_USER_NOTICE	    用户生成的通知。这类似于程序员使用 PHP 函数 trigger_error() 设置的 E_NOTICE。
//4096	E_RECOVERABLE_ERROR	可捕获的致命错误。类似 E_ERROR，但可被用户定义的处理程序捕获。（参见 set_error_handler()）
//8191	E_ALL	            所有错误和警告。（在 PHP 5.4 中，E_STRICT 成为 E_ALL 的一部分）

// 错误处理函数

/*
function customError($errno, $errstr){
    echo "<b>Error:</b> [$errno] $errstr<br>";
    echo "脚本结束";
    die();
}

// 设置错误处理函数
set_error_handler("customError",E_USER_WARNING);

// 触发错误
$test = 2;
if ($test>1) {
    trigger_error("变量值必须小于等于 1",E_USER_WARNING);
}

// trigger_error(msg,level) 创建用户级别的错误
//    可能的错误类型：
//    E_USER_ERROR - 致命的用户生成的 run-time 错误。错误无法恢复。脚本执行被中断。
//    E_USER_WARNING - 非致命的用户生成的 run-time 警告。脚本执行不被中断。
//    E_USER_NOTICE - 默认。用户生成的 run-time 通知。在脚本发现可能有错误时发生，但也可能在脚本正常运行时发生。

*/

// 错误记录
//error_log("输入自定义错误信息到系统日志");
//error_log("输入自定义错误信息到邮箱",1,"someone@example.com","From: webmaster@example.com");
//error_log("输入自定义错误信息到文件",3,"../logs/error.log");