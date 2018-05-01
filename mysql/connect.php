<?php
/** 连接MySQL
    PHP 5 及以上版本建议使用以下方式连接 MySQL :
        MySQLi extension ("i" 意为 improved)
        PDO (PHP Data Objects),PDO 可以连接12 种不同数据库
    在 PHP 早期版本中我们使用 MySQL 扩展。但该扩展在 2012 年开始不建议使用。
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 0:55
 */

$host = "localhost";  //数据库主机名
$port = "3306";       //端口号
$database = "test_php";   //使用的数据库
$username = "root";   //数据库连接用户名
$password = "ok";     //对应的密码


// 面向对象 创建连接
$conn = new mysqli($host,$username,$password,$database,$port);
// 检测连接
if ($conn->connect_error) { // 5.3以下不支持，请使用mysqli_connect_error()
    die("面向对象 数据库连接失败: " . $conn->connect_error);
}else{
    echo "面向对象 连接成功<br>";
}
//面向对象 关闭连接
$conn->close();


// 面向过程 创建连接
$conn = mysqli_connect($host,$username,$password,$database,$port);
// 检测连接
if (!$conn) {
    die("面向过程 数据库连接失败: " . mysqli_connect_error());
}
echo "面向过程 连接成功<br>";
//面向过程 关闭连接
mysqli_close($conn);


// PDO 创建连接
try{
$conn = new PDO("mysql:host=$host;dbname=$database",$username,$password);
echo "PDO 连接成功<br>";
}catch (PDOException $e){
    echo $e->getMessage();
}
//PDO 关闭连接
$conn = null;