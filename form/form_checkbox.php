<?php
/** PHP 下拉菜单单选
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/19 0:18
 */

$q = isset($_POST['q']) ? $_POST['q'] : "";
if(is_array($q)){
    $sites = array(
        'RUNOOB' => '菜鸟教程: http://www.runoob.com',
        'GOOGLE' => 'Google 搜索: http://www.google.com',
        'TAOBAO' => '淘宝: http://www.taobao.com',
    );
    foreach ($q as $val){
        echo $sites[$val] . "<br/>";
    }
}else{
?>
<!--action 属性值为空表示提交到当前脚本-->
<form method="post" action="">
    <!--可以通过将设置 select name="q[]" 以数组的方式获取-->
    <label><input type="checkbox" name="q[]" value="RUNOOB"> Runoob</label><br>
    <label><input type="checkbox" name="q[]" value="GOOGLE"> Google</label><br>
    <label><input type="checkbox" name="q[]" value="TAOBAO"> Taobao</label><br>
    <input type="submit" value="提交">
</form>
<?php } ?>
