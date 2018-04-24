<?php
/** 文件上传
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-24 16:52
 */

// 允许上传的图片后缀
$allowedExts = ["gif","jpg","png","jpeg"];
$temp = explode(".", $_FILES["file1"]["name"]);
$extension = end($temp); // 文件后缀名
// 上传限制
if ((($_FILES["file1"]["type"] == "image/gif") || ($_FILES["file1"]["type"] == "image/jpeg")
    || ($_FILES["file1"]["type"] == "image/jpg") || ($_FILES["file1"]["type"] == "image/pjpeg")
    || ($_FILES["file1"]["type"] == "image/x-png") || ($_FILES["file1"]["type"] == "image/png"))
    && (($_FILES["file1"]["size"]) < (1024*200)) // 文件大小小于200KB
    && in_array($extension,$allowedExts)){
    if($_FILES["file1"]["error"] > 0){
        echo "错误：" . $_FILES["file1"]["error"] . "<br>";
    }else{
        echo "上传文件名：" . $_FILES["file1"]["name"] . "<br>";
        echo "文件类型：" . $_FILES["file1"]["type"] . "<br>";
        echo "文件大小：" . ($_FILES["file1"]["size"] / 1024) . "KB <br>";
        echo "文件临时存储位置：" . $_FILES["file1"]["tmp_name"] . "<br>";

        // 判断upload 目录是否存在，如果没有 upload 目录，则创建
        if(!file_exists("../upload")){
            //创建目录
            mkdir("../upload");
        }
        //设置新文件名，防止重名,原文件名+日期+6位随机数
        date_default_timezone_set(PRC);
        $saveFileName = $temp[0] . "_" . date("YmdHis") . "_" . getRandomString(6) . "." . $extension;
        // 上传文件
        move_uploaded_file($_FILES["file1"]["tmp_name"],"../upload/" . $saveFileName);
        echo "文件存储在: /upload/" . $saveFileName;
    }
}else{
    echo "文件格式错误";
}

// 获取指定位数的随机数字
function getRandomString($count = 1){
    $str = "";
    for($i = 0;$i < $count;$i++){
        $str .= random_int(0,9);
    }
    return $str;
}