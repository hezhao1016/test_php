<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>表单验证</title>
    <style>
        .red{color:red;}
    </style>
</head>
<body>

<h1>PHP 表单验证实例</h1>
<p>* 必需字段。</p>
<form method="post" action="<?php echo $_SERVER[''];?>">
    <p>名字：<input type="text" name="name"/> <span class="red">*</span></p>
    <p>名字：<input type="text" name="name"/> <span class="red">*</span></p>
    <p>名字：<input type="text" name="name"/> <span class="red">*</span></p>
    <p>名字：<input type="text" name="name"/> <span class="red">*</span></p>
    <p>名字：<input type="text" name="name"/> <span class="red">*</span></p>
    <p><input type="submit" value="提交"></p>
</form>

<?php

?>

</body>
</html>
