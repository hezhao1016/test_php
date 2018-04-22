<?php
/** PHP 下拉菜单单选
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/19 0:18
 */

$q = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : "";

if($q){
    switch ($q){
        case "RUNOOB":
            echo '菜鸟教程<br>http://www.runoob.com';
            break;
        case "GOOGLE":
            echo 'Google 搜索<br>http://www.google.com';
            break;
        case "TAOBAO":
            echo '淘宝<br>http://www.taobao.com';
            break;
    }
}else{
?>
<!--action 属性值为空表示提交到当前脚本-->
<form method="get" action="">
    <label><input type="radio" name="q" value="RUNOOB" />Runoob</label>
    <label><input type="radio" name="q" value="GOOGLE" />Google</label>
    <label><input type="radio" name="q" value="TAOBAO" />Taobao</label>
    <button type="submit">提交</button>
</form>
<?php } ?>
