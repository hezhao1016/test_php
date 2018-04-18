<?php
/** PHP 下拉菜单单选
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/19 0:18
 */

/*
htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。
    & （和号） 成为 &amp;
    " （双引号） 成为 &quot;
    ' （单引号） 成为 &#039;
    < （小于） 成为 &lt;
    > （大于） 成为 &gt;
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
    <select name="q">
        <option value="">选择一个站点：</option>
        <option value="RUNOOB">菜鸟教程</option>
        <option value="GOOGLE">谷歌</option>
        <option value="TAOBAO">淘宝</option>
    </select>
    <button type="submit">提交</button>
</form>
<?php } ?>
