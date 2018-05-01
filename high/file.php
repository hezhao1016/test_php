<?php
/** 文件
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/23 0:03
 */

//fopen() 函数用于在 PHP 中打开文件。

/*
文件可能通过下列模式来打开
r	只读。在文件的开头开始。
r+	读/写。在文件的开头开始。
w	只写。打开并清空文件的内容；如果文件不存在，则创建新文件。
w+	读/写。打开并清空文件的内容；如果文件不存在，则创建新文件。
a	追加。打开并向文件末尾进行写操作，如果文件不存在，则创建新文件。
a+	读/追加。通过向文件末尾写内容，来保持文件内容。
x	只写。创建新文件。如果文件已存在，则返回 FALSE 和一个错误。
x+	读/写。创建新文件。如果文件已存在，则返回 FALSE 和一个错误。

注释：如果 fopen() 函数无法打开指定文件，则返回 0 (false)。
*/

//$file = fopen("D:/ztest/a.txt","r") or exit("无法打开文件！");
//// feof()检测文件末尾
//while (!feof($file)){
//    // fgets() 逐行读取文件
//    echo fgets($file) . "<br>";
//
//    // 逐字符读取文件
////    echo fgetc($file);
//}
////关闭文件
//fclose($file);

//可以直接获取网页内容
//$file = fopen("https://www.baidu.com","r");

//$file = fopen("test.txt","r");
// 1、返回读取的字符串，一次最多1024个字节
//$contents = fread($file,1024);
// 2、读取整个文件
//$contents = fread($file,filesize("test.txt"));

//// 写入
//$file = fopen("D:/ztest/b.txt","w");
//fwrite($file,"这个人很懒，什么也没留下。\r\n2018.04.23 凌晨");
//fflush($file); // 刷新缓冲
//fclose($file);


//把整个文件读入一个字符串中
echo file_get_contents("D:/ztest/a.txt");
echo "<br>";

//把一个字符串写入文件中
//echo file_put_contents("D:/ztest/a_put.txt","Hello World. Testing!");


//返回路径中的文件名部分
$path = "/testweb/home.php";
echo basename($path) ."<br/>";
echo basename($path,".php") ."<br/>";

//以数组的形式返回关于文件路径的信息
print_r(pathinfo("/testweb/test.txt"));
echo "<br/>";
print_r(pathinfo("/testweb/test.txt",PATHINFO_BASENAME));
echo "<br/>";

//返回关于文件的信息
print_r(stat("D:/ztest"));
echo "<br/>";

//返回指定文件或目录的类型,可能的返回值：fifo,char,dir,block,link,file,unknown
echo filetype("D:/ztest") . "<br/>";

//返回指定文件的大小。单位字节
echo filesize("D:/ztest/b.txt") . "<br/>";

//检查文件或目录是否存在
echo file_exists("D:/ztest/b.txt") . "<br/>";

//检查指定的文件是否是一个目录
var_dump(is_dir("D:/ztest/"));
echo "<br/>";

//检查指定的文件是否是一个文件
var_dump(is_file("D:/ztest/"));
echo "<br/>";

//检查指定的文件是否可读。
var_dump(is_readable("D:/ztest/a.txt"));
echo "<br/>";

//检查指定的文件是否可写。
var_dump(is_writable("D:/ztest/a.txt"));
echo "<br/>";

//创建目录
//var_dump(mkdir("D:/ztest/z1"));

//删除空目录
//var_dump(rmdir("D:/ztest/z1"));

//删除文件
//var_dump(unlink("D:/ztest/b.txt"));

//复制文件
//var_dump(copy("D:/ztest/a.txt","D:/ztest/a_copy.txt"));