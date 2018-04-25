<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>安全邮件</title>
</head>
<body>

<?php
function spamcheck($field){
    // filter_var() 过滤 e-mail
    // 使用 FILTER_SANITIZE_EMAIL
    $field = filter_var($field,FILTER_SANITIZE_EMAIL);

    // 使用 FILTER_VALIDATE_EMAIL
    if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}

// 安全邮件，防止E-mail注入
if(isset($_REQUEST["from"]) && isset($_REQUEST["to"])){ // 如果接收到邮箱参数则发送邮件
    // 判断邮箱是否合法
    $from = $_REQUEST["from"]; // 发送人
    $to = $_REQUEST["to"]; // 接收人

    if(!spamcheck($from) || !spamcheck($to)){
        echo "Email输入非法";
        return;
    }
    $subject = $_REQUEST["subject"]; // 标题
    $message = $_REQUEST["message"]; // 正文
    $headers = "From:" . $from; // 头部信息
    mail($to,$subject,$message,$headers);
    echo "邮件已发送" . "<br>";
}else{ // 如果没有邮箱参数则显示表单
?>
    <h1>安全邮件</h1>
    <form method="post" action="email_safe.php">
        <p>From: <input name="from" type="text"></p>
        <p>To: <input name="to" type="text"></p>
        <p>Subject: <input name="subject" type="text"></p>
        <p>Message:<br>
        <textarea name="message" rows="15" cols="40"></textarea></p>
        <p><input type="submit" value="提交"></p>
    </form>
<?php } ?>

</body>
</html>