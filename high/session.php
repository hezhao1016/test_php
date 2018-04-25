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
