<?php
/** 创建数据库
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 10:05
 */

$host = "localhost";  //数据库主机名
$username = "root";   //数据库连接用户名
$password = "ok";     //对应的密码


// 面向对象 创建连接
$conn = new mysqli($host,$username,$password);
// 检测连接
if ($conn->connect_error) { // 5.3以下不支持，请使用mysqli_connect_error()
    die("面向对象 数据库连接失败: " . $conn->connect_error);
}

//创建数据库
$sql = "CREATE DATABASE test_php";
if($conn->query($sql) === TRUE){
    echo "面向对象 数据库创建成功<br>";

    $sql = "DROP DATABASE test_php";
    if($conn->query($sql) === TRUE){
        echo "面向对象 数据库删除成功<br>";
    }else{
        echo "面向对象 数据库删除失败: " . $conn->error . "<br>";
    }
}else{
    echo "面向对象 数据库创建失败: " . $conn->error . "<br>";
}

//面向对象 关闭连接
$conn->close();


// 面向过程 创建连接
$conn = mysqli_connect($host,$username,$password);
// 检测连接
if (!$conn) {
    die("面向过程 数据库连接失败: " . mysqli_connect_error());
}

//创建数据库
$sql = "CREATE DATABASE test_php";
if(mysqli_query($conn,$sql)){
    echo "面向过程 数据库创建成功<br>";

    $sql = "DROP DATABASE test_php";
    if(mysqli_query($conn,$sql)){
        echo "面向过程 数据库删除成功<br>";
    }else{
        echo "面向过程 数据库删除失败: " . mysqli_error($conn) . "<br>";
    }
}else{
    echo "面向过程 数据库创建失败: " . mysqli_error($conn) . "<br>";
}

//面向过程 关闭连接
mysqli_close($conn);


// PDO 创建连接
try{
    $conn = new PDO("mysql:host=$host;dbname=$database",$username,$password);

    // 设置 PDO 错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE test_php";

    // 执行一条 SQL 语句，并返回受影响的行数
    $conn->exec($sql);
    echo "PDO 数据库创建成功<br>";

    $sql = "DROP DATABASE test_php";
    $conn->exec($sql);
    echo "PDO 数据库删除成功<br>";

}catch (PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}
//PDO 关闭连接
$conn = null;