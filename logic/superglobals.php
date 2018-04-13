<?php
/** 超级全局变量
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 15:57
 */

//超级全局变量在PHP 4.1.0之后被启用, 是PHP系统中自带的变量，在一个脚本的全部作用域中都可用。


//$GLOBALS
//$GLOBALS 是PHP的一个超级全局变量组，在一个PHP脚本的全部作用域中都可以访问。
//$GLOBALS 是一个包含了全部变量的全局组合数组。变量的名字就是数组的键。
$x = 75;
$y = 25;

function addition(){
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
addition();
echo $z;
echo '<br><br>';

//$_SERVER
//$_SERVER 是一个包含了诸如头信息(header)、路径(path)、以及脚本位置(script locations)等等信息的数组。这个数组中的项目由 Web 服务器创建。不能保证每个服务器都提供全部项目；服务器可能会忽略一些，或者提供一些没有在这里列举出来的项目。
echo $_SERVER['PHP_SELF']; // 当前执行脚本的文件名
echo '<br>';
echo $_SERVER['SERVER_NAME']; // 当前运行脚本所在的服务器的主机名
echo '<br>';
echo $_SERVER['SERVER_PORT']; // 服务器端口号
echo '<br>';
echo $_SERVER['HTTP_HOST']; // 当前请求头中 Host: 项的内容
echo '<br>';
echo $_SERVER['HTTP_REFERER']; // 引导用户代理到当前页的前一页的地址
echo '<br>';
echo $_SERVER['REMOTE_ADDR']; // 浏览当前页面的用户的 IP 地址。
echo '<br>';
echo $_SERVER['HTTP_USER_AGENT']; // 头部信息
echo '<br>';
echo $_SERVER['SCRIPT_NAME']; // 脚本路径
echo '<br>';
echo $_SERVER['SCRIPT_FILENAME']; // 脚本绝对路径
echo '<br><br>';


//$_REQUEST | 请求数据
echo '$_REQUEST:' . $_REQUEST['fname'] . "<br>";

//$_POST | 用于收集POST数据
echo '$_POST:' . $_POST["fname"] . "<br>";

//$_GET | 用于收集GET数据
echo '$_GET:' . $_GET["fname"] . "<br>";

//$_FILES | 文件数组
//$_ENV | 服务器端环境变量的数组
//$_COOKIE
//$_SESSION

?>

<html>
<body>
<hr/>
<h1>测试 $_REQUEST</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input value="提交" type="submit">
</form>

<h1>测试 $_POST</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input value="提交" type="submit">
</form>

<h1>测试 $_GET 表单</h1>
<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Name: <input type="text" name="fname">
    <input value="提交" type="submit">
</form>

<h1>测试 $_GET 超链接</h1>
<a href="<?php echo $_SERVER['PHP_SELF'];?>?fname=我是从超链接跳转来的。">点击跳转</a>

</body>
</html>
