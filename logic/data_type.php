<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-12 15:27
 */

//PHP 数据类型
//String（字符串）, Integer（整型）, Float（浮点型）, Boolean（布尔型）, Array（数组）, Object（对象）, NULL（空值）

//字符串 ，单引号、双引号一样
echo "<br>字符串<hr/>";
$text = "Hello,World!";
var_dump($text);
echo "<br>";
$text = 'Hello,World!';
var_dump($text);
echo "<br>";

//整型
echo "<br>整型<hr/>";
$x = 5985;
var_dump($x);
echo "<br>";
$x = -345; // 负数
var_dump($x);
echo "<br>";
$x = 0x8C; // 十六进制数
var_dump($x);
echo "<br>";
$x = 047; // 八进制数
var_dump($x);
echo "<br>";

//浮点型
echo "<br>浮点型<hr/>";
$x = 10.365;
var_dump($x);
echo "<br>";
$x = 2.4e3;
var_dump($x);
echo "<br>";
$x = 8E-5;
var_dump($x);
echo "<br>";

#布尔
echo "<br>布尔<hr/>";
$x = true;
$y = false;
var_dump($x);
echo "<br>";
var_dump($y);
echo "<br>";


//数组
echo "<br>数组<hr/>";
$arrs = ["苹果","香蕉","梨子"];
$arrs[3] = "菠萝";
var_dump($arrs);
echo "<br>";
echo $arrs[3], "<br/>";

$arrs2 = array("手机","电脑","平板");
var_dump($arrs2);
echo "<br>";

//键值对数组
$dicts = array("name" => "张三", "age" => "18", "sex" => "男");
$dicts["love"] = ["name" => "李四", "address" => "江西人"];
var_dump($dicts);
echo "<br>";


//对象
class Car{
    var $color;

    public function __construct($color="green"){
        $this->color = $color;
    }
    function what_color(){
        return $this->color;
    }
}

echo "<br>对象<hr/>";

$my_car = new Car; //没有参数 可以不用括号
echo $my_car->what_color(), "<br/>";

$my_car = new Car();
echo $my_car->what_color(), "<br/>";

$my_car = new Car("red");
echo $my_car->what_color(), "<br/>";


//NULL
echo "<br>NULL<hr/>";
$x = null;
var_dump($x);


// 获取变量类型
$a = 123;//整型
$b = '123';//字符串型
$c = 1.23;//浮点型
$d = true;//布尔型
$e = null;//NULL型
echo '<br>$a是',gettype($a),'型','<br>';
echo '$b是',gettype($b),'型','<br>';
echo '$c是',gettype($c),'型','<br>';
echo '$d是',gettype($d),'型','<br>';
echo '$e是',gettype($e),'型','<br>';


// 判断是否是某一个数据类型
echo "<hr>";
// 是否是字符串
var_dump(is_string("abc"));    echo "<br>";
// 是否是整形
var_dump(is_int(1));    echo "<br>";
var_dump(is_integer(1));    echo "<br>";
// 是否是长整型
var_dump(is_long(1000000000));    echo "<br>";
// 是否是浮点型
var_dump(is_float(1.1));    echo "<br>";
var_dump(is_double(1.10));    echo "<br>";
// 是否是数字
var_dump(is_numeric(3.1415926));    echo "<br>";
// 是否是布尔
var_dump(is_bool(false));    echo "<br>";
// 是否是Null
var_dump(is_null(null));    echo "<br>";
// 是否是数组
var_dump(is_array([1,2,3]));    echo "<br>";
// 是否是可迭代的
var_dump(is_iterable([1,2,3]));    echo "<br>";
// 是否是对象
var_dump(is_object(new Car()));    echo "<br>";
// 是否是文件
var_dump(is_file("D:/msdia80.dll"));    echo "<br>";
// 是否是目录
var_dump(is_dir("D:/"));    echo "<br>";
