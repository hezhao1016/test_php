<?php
/** 创建数据表
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 10:21
 */
$host = "localhost";
$username = "root";
$password = "ok";
$dbname = "test_php";


//MySQLi - 面向对象
// 创建连接
$conn = new mysqli($host, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE myguests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table myguests created successfully<br>";
} else {
    echo "创建数据表错误: " . $conn->error . "<br>";
}

$conn->close();


//MySQLi - 面向过程
// 创建连接
$conn = mysqli_connect($host, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}

// 使用 sql 创建数据表
$sql = "CREATE TABLE myguests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "数据表 myguests 创建成功<br>";
} else {
    echo "创建数据表错误: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);


//PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // 设置 PDO 错误模式，用于抛出异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 使用 sql 创建数据表
    $sql = "CREATE TABLE myguests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";

    // 使用 exec() ，没有结果返回
    $conn->exec($sql);
    echo "数据表 myguests 创建成功<br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;