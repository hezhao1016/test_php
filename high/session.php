<!--
使用session之前必须先启动会话
注释：session_start() 函数必须位于 <html> 标签之前-->

<?php
//向服务器注册用户的会话，以便您可以开始保存用户信息，同时会为用户会话分配一个 UID
session_start();

//存储 Session 数据
if(isset($_SESSION["views"])){
    $_SESSION["views"] = $_SESSION["views"] + 1;
}else{
    $_SESSION["views"] = 1;
}

// 释放指定的 session 数据
//unset($_SESSION["views"]);

// 彻底销毁session，会删除所有session数据
//session_destroy();


// PHP 7 Session 选项
/*
PHP 7 session_start()函数可以接收一个数组作为参数，可以覆盖php.ini中session的配置项。
这个特性也引入了一个新的php.ini设置（session.lazy_write）,默认情况下设置为 true，意味着session数据只在发生变化时才写入。
除了常规的会话配置指示项， 还可以在此数组中包含 read_and_close 选项。如果将此选项的值设置为 TRUE， 那么会话文件会在读取完毕之后马上关闭， 因此，可以在会话数据没有变动的时候，避免不必要的文件锁。

实例 把cache_limiter设置为私有的，同时在阅读完session后立即关闭。
session_start([
   'cache_limiter' => 'private',
   'read_and_close' => true,
]);
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session示例</title>
</head>
<body>
<?php
//获取Session数据
echo "浏览量：" . $_SESSION["views"];
?>
</body>
</html>
