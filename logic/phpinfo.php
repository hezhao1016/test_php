<?php
// 显示所有信息，默认显示 INFO_ALL
phpinfo();

/*
INFO_GENERAL	    1	配置的命令行、 php.ini 的文件位置、建立的时间、Web 服务器、系统及更多其他信息。
INFO_CREDITS	    2	PHP 贡献者名单。参加 phpcredits()。
INFO_CONFIGURATION	4	当前PHP指令的本地值和主值。参见 ini_get()。
INFO_MODULES	    8	已加载的模块和模块相应的设置。参见 get_loaded_extensions()。
INFO_ENVIRONMENT	16	环境变量信息也可以用 $_ENV 获取。
INFO_VARIABLES	    32	显示所有来自 EGPCS (Environment, GET, POST, Cookie, Server) 的 预定义变量。
INFO_LICENSE	    64	PHP许可证信息。参见 » license FAQ。
INFO_ALL	        -1	显示以上所有信息。默认
*/

// 仅仅显示PHP模块信息，phpinfo(8) 返回同样的结果。
//phpinfo(INFO_MODULES);


// --------------------------------------------------------------------
// 当前的PHP版本
//echo 'PHP版本: ' . phpversion() . "<br>";

// PHP_VERSION_ID 自 PHP 5.2.7 起有效，
// 如果我们的版本低于该版本，则用以下代码来模拟
if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);

    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}

// PHP_VERSION_ID 定义为一个数字，PHP 版本越新，数字越大。
// 它的定义是以下的表达式：
//
// $version_id = $major_version * 10000 + $minor_version * 100 + $release_version;
//
// 现在我们可以通过 PHP_VERSION_ID 来检查 PHP 版本，
// 而不用每次都必须用 version_compare() 来检查 PHP 是否支持某个功能。
//
// 比如，我们在此可以定义一系列 PHP_VERSION_* constants 常量，
// 而在 5.2.7 之前的版本并没有被定义。

if (PHP_VERSION_ID < 50207) {
    define('PHP_MAJOR_VERSION',   $version[0]);
    define('PHP_MINOR_VERSION',   $version[1]);
    define('PHP_RELEASE_VERSION', $version[2]);

    // 等等， ...
}
// --------------------------------------------------------------------


//获取当前 Zend 引擎的版本
//echo "Zend 版本: " . zend_version() . "<br>";
