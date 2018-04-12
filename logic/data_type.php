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
class Car
{
    var $color;

    public function __construct($color="green")
    {
        $this->color = $color;
    }
    function what_color()
    {
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
