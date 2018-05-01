<?php
/** 插入语句
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 10:28
 */

$host = "localhost";
$username = "root";
$password = "ok";
$dbname = "test_php";


//MySQLi - 面向对象
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "新记录插入成功<br>";
} else {
    echo "insert错误: " . $conn->error . "<br>";
}
$conn->close();


//MySQLi - 面向过程
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Tom', 'Yal', 'tom@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功<br>";
} else {
    echo "insert错误: " . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);


//PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Frank', 'Ano', 'frank@example.com')";

    $conn->exec($sql);
    echo "新记录插入成功<br>";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;