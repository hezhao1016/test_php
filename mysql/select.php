<?php
/** SELECT
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 11:24
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
$sql = "select * from myguests where id < 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 以下标的取出结果
//    while($row = $result->fetch_row()){
//        echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
//    }

    // 以字段名的取出结果
    while($row = $result->fetch_assoc()){
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }

    // 字段名以及下标都可以取出结果
//    while($row = $result->fetch_array()){
//        echo "id: " . $row["id"]. " - Name: " . $row[1]. " " . $row["lastname"]. "<br>";
//    }

    // 返回一个对象
//    while($row = $result->fetch_object()){
//        echo "id: " . $row->id. " - Name: " . $row->firstname. " " . $row->lastname. "<br>";
//    }

    // 返回所有查询结果列表
//    echo "<pre>";
//    $datas = $result->fetch_all();
//    var_dump($datas);
//    echo "</pre>";
}

// 释放结果集
$result->free_result();

$conn->close();


//MySQLi - 面向过程
echo "<hr>";
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "select * from myguests where id < 10";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    // 以下标的取出结果
//    while($row = mysqli_fetch_row($result)){
//        echo "id: " . $row[0]. " - Name: " . $row[1]. " " . $row[2]. "<br>";
//    }

    // 以字段名的取出结果
    while($row = mysqli_fetch_assoc($result)){
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }

    // 字段名以及下标都可以取出结果
//    while($row = mysqli_fetch_array($result)){
//        echo "id: " . $row["id"]. " - Name: " . $row[1]. " " . $row["lastname"]. "<br>";
//    }

    // 返回一个对象
//    while($row = mysqli_fetch_object($result)){
//        echo "id: " . $row->id. " - Name: " . $row->firstname. " " . $row->lastname. "<br>";
//    }

    // 返回所有查询结果列表
//    echo "<pre>";
//    $datas = mysqli_fetch_all($result);
//    var_dump($datas);
//    echo "</pre>";

//    mysqli_fetch_all(result,resulttype);
//    resulttype	可选。规定应该产生哪种类型的数组
//        MYSQLI_ASSOC 列名
//        MYSQLI_NUM 下标
//        MYSQLI_BOTH 两者
}

// 释放结果集
mysqli_free_result($result);

mysqli_close($conn);


//PDO
try {
    echo "<hr>";
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from myguests where id < 10";
    $result = $conn->query($sql);

    if($result->rowCount() > 0){
        // 设置结果集，默认 FETCH_BOTH
        $result->setFetchMode(PDO::FETCH_ASSOC);
        //FETCH_ASSOC - 字段名
        //FETCH_NUM - 下标
        //FETCH_BOTH - 字段名以及下标
        //FETCH_OBJ - 对象

        while($row = $result->fetch()){
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }

        // 返回一个对象
//        while($row = $result->fetchObject()){
//            echo "id: " . $row->id. " - Name: " . $row->firstname. " " . $row->lastname. "<br>";
//        }

        // 返回所有查询结果列表
//        echo "<pre>";
//        $datas = $result->fetchAll();
//        var_dump($datas);
//        echo "</pre>";
    }
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;