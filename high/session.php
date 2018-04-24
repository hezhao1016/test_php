<!--
启动会话
注释：session_start() 函数必须位于 <html> 标签之前-->

<?php
//向服务器注册用户的会话，以便您可以开始保存用户信息，同时会为用户会话分配一个 UID
session_start();

//存储 Session 数据
$_SESSION["views"] = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session示例</title>
</head>
<body>
<?php
//检索Session数据
echo "浏览量：" . $_SESSION["views"];
?>
</body>
</html>
