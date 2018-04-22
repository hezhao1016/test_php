<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>表单验证</title>
    <style>
        .error{color:red;}
    </style>
</head>
<body>

<?php
// 定义变量并默认设置为空值
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "名字是必需的。";
    }else{
        $name = test_input($_POST["name"]);
        // 正则表达式
        if(!preg_match("/^[a-zA-Z ]*$",$name)){
            $nameErr = "只允许字母和空格";
        }
    }

    if(empty($_POST["email"])){
        $emailErr = "邮箱是必需的。";
    }else{
        $email = test_input($_POST["email"]);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "非法邮箱格式";
        }
    }

    if(empty($_POST["website"])){
        $website = "";
    }else{
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "非法的 URL 的地址";
        }
    }

    if(empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = test_input($_POST["comment"]);
    }

    if(empty($_POST["gender"])){
        $genderErr = "性别是必需的。";
    }else{
        $gender = test_input($_POST["gender"]);
    }
}

//当用户提交表单时，我们将做以下事情，：
//1、使用 trim() 函数去除用户输入数据中不必要的字符 (如：空格，tab，换行)。
//2、使用 stripslashes()函数去除用户输入数据中的反斜杠 (\)
//3、使用 htmlspecialchars()函数把字符转换为 HTML 实体
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h1>PHP 表单验证实例</h1>
<p class="error">* 必需字段。</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <p>
        名字：<input type="text" name="name" value="<?php echo $name;?>"/>
        <span class="error">* <?php echo $nameErr;?></span>
    </p>
    <p>
        E-mail：<input type="text" name="email" value="<?php echo $email;?>"/>
        <span class="error">* <?php echo $emailErr;?></span>
    </p>
    <p>
        网址：<input type="text" name="website" value="<?php echo $website;?>"/>
        <span class="error">* <?php echo $websiteErr;?></span>
    </p>
    <p>
        备注：<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    </p>
    <p>
        性别：<input type="radio" name="gender" value="female" <?php if (isset($gender) && $gender=="female") echo "checked";?> /> 女
        <input type="radio" name="gender" value="male" <?php if (isset($gender) && $gender=="male") echo "checked";?> /> 男
        <span class="error">* <?php echo $genderErr;?></span>
    </p>
    <p>
        <input type="submit" value="提交">
    </p>
</form>

<?php
echo "<h2>您输入的内容是：</h2>";
echo "Name: " . $name . "<br>";
echo "Email: " . $email . "<br>";
echo "WebSite: " . $website . "<br>";
echo "Comment: " . $comment . "<br>";
echo "Gender: " . $gender . "<br>";
?>

</body>
</html>
