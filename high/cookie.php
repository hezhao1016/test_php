<!--
设置 cookie
setcookie() 函数用于设置 cookie。
注释：setcookie() 函数必须位于 <html> 标签之前。-->

<?php
// 创建名为 "user" 的 cookie，一小时后过期
setcookie("user","hezhao",time()+3600);
//注释：在发送 cookie 时，cookie 的值会自动进行 URL 编码，在取回时进行自动解码。（为防止 URL 编码，请使用 setrawcookie() 取而代之。）

//取回Cookie
echo $_COOKIE["user"] . "<br>";
// 查看所有Cookie
print_r($_COOKIE);
echo "<hr>";

//删除 Cookie，只需要让过期日期变更为过去的时间点
//setcookie("user","",time()-3600);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie示例</title>
</head>
<body>
    <?php
        if(isset($_COOKIE["user"])){
            echo "欢迎 " . $_COOKIE["user"] . " 回来!<br>";
        }else{
            echo "普通访客！<br>";
        }
    ?>
</body>
</html>
