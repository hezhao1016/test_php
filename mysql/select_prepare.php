<?php
/** 预处理查询
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 12:30
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

$stmt = $conn->stmt_init();
$sql = "select id,firstname,lastname,email,reg_date from myguests where id < ?";

if($stmt->prepare($sql)){
    $stmt->bind_param("i",$id);
    $id = 10;
    $stmt->execute();

    // 绑定结果集
    $stmt->bind_result($id,$firstname,$lastname,$email,$reg_date);
    while ($stmt->fetch()){
        echo $id . " | " . $firstname . " | " . $lastname . " | " . $email . " | " . $reg_date . "<br>";
    }
    $stmt->close();
}
$conn->close();


//MySQLi - 面向过程
echo "<hr>";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "select id,firstname,lastname,email,reg_date from myguests where id < ?";

$stmt = mysqli_stmt_init($conn);

if($stmt->prepare($sql)){
    mysqli_stmt_bind_param($stmt,"i",$id);
    $id = 10;
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$id,$firstname,$lastname,$email,$reg_date);
    while (mysqli_stmt_fetch($stmt)){
        echo $id . " | " . $firstname . " | " . $lastname . " | " . $email . " | " . $reg_date . "<br>";
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


//PDO
try {
    echo "<hr>";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from myguests where id < :id";

    $stmt = $conn->prepare($sql,[PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->bindParam(":id",$id,PDO::PARAM_INT);
    $id = 10;
    $stmt->execute();

    if($stmt->rowCount() > 0){
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $stmt->fetch()){
            echo $row['id'] . " | " . $row['firstname'] . " | " . $row['lastname'] . " | " . $row['email'] . " | " . $row['reg_date'] . "<br>";
        }
    }
    $stmt->closeCursor();
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;



//PDO 展示在HTML 表格中
echo "<hr>";
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests");
    $stmt->execute();

    // 设置结果集为关联数组
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";