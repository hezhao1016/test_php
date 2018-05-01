<?php
$q = isset($_GET["q"]) ? intval($_GET["q"]) : '';

if(empty($q)) {
    echo '请选择一个网站';
    exit;
}

$con = mysqli_connect('localhost','root','ok');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
// 选择数据库
mysqli_select_db($con,"test_php");
// 设置编码，防止中文乱码
mysqli_set_charset($con, "utf8");

$sql = "SELECT * FROM Websites WHERE id = " . $q ;

$result = mysqli_query($con,$sql);

$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

// 输出JSON
echo json_encode($datas);

mysqli_close($con);