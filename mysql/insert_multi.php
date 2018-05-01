<?php
/** 插入多条语句
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 10:34
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
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

if ($conn->multi_query($sql) === TRUE) {
    echo "新记录插入成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}
$conn->close();


//MySQLi - 面向过程
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES ('John_2', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Mary_2', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO myguests (firstname, lastname, email)
VALUES ('Julie_2', 'Dooley', 'julie@example.com')";

if (mysqli_multi_query($conn, $sql)) {
    echo "新记录插入成功<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
}
mysqli_close($conn);


//PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction(); // 开始事务

    // 执行语句
    $conn->exec("INSERT INTO myguests (firstname, lastname, email) 
    VALUES ('John_PDO', 'Doe', 'john@example.com')");
    $conn->exec("INSERT INTO myguests (firstname, lastname, email) 
    VALUES ('Mary_PDO', 'Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO myguests (firstname, lastname, email) 
    VALUES ('Julie_PDO', 'Dooley', 'julie@example.com')");

    $conn->commit();
    echo "新记录插入成功<br>";
} catch(PDOException $e) {
    // 如果执行失败回滚
    $conn->rollback();
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
