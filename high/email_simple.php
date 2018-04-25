<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>简易文本邮件</title>
</head>
<body>

<?php
// 简易文本邮件,不安全
if(isset($_REQUEST["from"]) && isset($_REQUEST["to"])){ // 如果接收到邮箱参数则发送邮件
    $from = $_REQUEST["from"]; // 发送人
    $to = $_REQUEST["to"]; // 接收人
    $subject = $_REQUEST["subject"]; // 标题
    $message = $_REQUEST["message"]; // 正文
    $headers = "From:" . $from; // 头部信息
    mail($to,$subject,$message,$headers);
    echo "邮件已发送" . "<br>";
}else{ // 如果没有邮箱参数则显示表单
?>
    <h1>简易文本邮件</h1>
    <form method="post" action="email_simple.php">
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