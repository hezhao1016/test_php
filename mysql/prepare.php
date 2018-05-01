<?php
/** 预处理语句
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 10:44
 */

//预处理语句对于防止 MySQL 注入，用于执行多个相同的 SQL 语句，并且执行效率更高。
//预留的值使用参数 "?" 标记

$host = "localhost";
$username = "root";
$password = "ok";
$dbname = "test_php";


//MySQLi - 面向对象
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
// 预处理及绑定
$stmt = $conn->prepare("INSERT INTO myguests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$firstname,$lastname,$email);
//bind_param函数绑定了 SQL 的参数，且告诉数据库参数的值。 "sss" 参数列处理其余参数的数据类型。s 字符告诉数据库该参数为字符串。
//参数有以下四种类型:
//    i - integer（整型）
//    d - double（双精度浮点型）
//    s - string（字符串）
//    b - BLOB（binary large object:二进制大对象）
//每个参数都需要指定类型。

// 设置参数并执行
$firstname = "John_mysqli_prepare";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary_mysqli_prepare";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie_mysqli_prepare";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "新记录插入成功<br>";
$stmt->close();
$conn->close();


//MySQLi - 面向过程
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "INSERT INTO myguests(firstname, lastname, email)  VALUES(?, ?, ?)";

// 为 mysqli_stmt_prepare() 初始化 statement 对象
$stmt = mysqli_stmt_init($conn);

//预处理语句
if(mysqli_stmt_prepare($stmt,$sql)){
    // 绑定参数
    mysqli_stmt_bind_param($stmt,'sss',$firstname,$lastname,$email);

    // 设置参数并执行
    $firstname = 'John_mysqli2_prepare';
    $lastname = 'Doe';
    $email = 'john@example.com';
    mysqli_stmt_execute($stmt);

    $firstname = 'Mary_mysqli2_prepare';
    $lastname = 'Moe';
    $email = 'mary@example.com';
    mysqli_stmt_execute($stmt);

    $firstname = 'Julie_mysqli2_prepare';
    $lastname = 'Dooley';
    $email = 'julie@example.com';
    mysqli_stmt_execute($stmt);

    echo "新记录插入成功<br>";
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


//PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 预处理语句，绑定参数
    $stmt = $conn->prepare("INSERT INTO myguests (firstname, lastname, email) 
    VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // 插入行
    $firstname = "John_pdo_prepare";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();

    // 插入其他行
    $firstname = "Mary_pdo_prepare";
    $lastname = "Moe";
    $email = "mary@example.com";
    $stmt->execute();

    // 插入其他行
    $firstname = "Julie_pdo_prepare";
    $lastname = "Dooley";
    $email = "julie@example.com";
    $stmt->execute();

    echo "新记录插入成功<br>";

    $stmt->closeCursor();
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;