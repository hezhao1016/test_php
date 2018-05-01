<?php
/** 各种exists
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-28 19:36
 */

function test1(){
    echo "test1";
}

echo "<h3>检查某个函数是否存在 [test1]</h3>";
var_dump(function_exists("test1")); echo "<br>";


echo "<h3>检查数组里是否有指定的键名或索引</h3>";
$arr = ['a','b','c' => 'ck'];
var_dump(array_key_exists("c",$arr)); echo "<br>";
var_dump(array_key_exists(1,$arr)); echo "<br>";
var_dump(key_exists(2,$arr)); echo "<br>"; // key_exists() 是 array_key_exists()的别名

//array_key_exists() 与 isset() 的对比 : isset() 对于数组中为 NULL 的值不会返回 TRUE，而 array_key_exists() 会
$search_array = array('first' => null, 'second' => 4);
var_dump(isset($search_array['first'])); echo "<br>";
var_dump(array_key_exists('first', $search_array)); echo "<br>";

//array_keys() - 返回数组中部分的或所有的键名
var_dump(array_keys($arr)); echo "<br>";
//in_array() - 检查数组中是否存在某个值
var_dump(in_array('a',$arr)); echo "<br>";


echo "<h3>isset() - 检测变量是否已设置并且非 NULL</h3>";
$temp = 'a';
$temp2 = null;
var_dump(isset($temp)); echo "<br>";
var_dump(isset($temp2)); echo "<br>";


echo "<h3>检查文件是否存在 [D:/]</h3>";
var_dump(file_exists("D:/")); echo "<br>";


//trait_exists() 检查指定的 trait 是否存在
trait World {
    private static $instance;
    protected $tmp;
    public static function World(){
        // new static() 返回 具体实现类的对象，即 new Hello()
        self::$instance = new static();
        // get_called_class() 后期静态绑定类的名称 即 Hello
        self::$instance->tmp = get_called_class().' '.__TRAIT__;
        return self::$instance;
    }
}
if ( trait_exists( 'World' ) ) {
    class Hello {
        use World;
        public function text( $str ){
            return $this->tmp.$str;
        }
    }
}
echo "<h2>trait_exists() 检查指定的 trait 是否存在</h2>";
echo Hello::World()->text('!!!'); // Hello World!!!


//interface_exists() 检查接口是否已被定义
interface IPaint{
    function print($msg);
}

// 在尝试使用前先检查接口是否存在
if (interface_exists('IPaint')) {
    class ColorPaint implements IPaint{
        function print($msg){
            echo $msg;
        }
    }
}

$colorPrint = new ColorPaint;
$colorPrint->print("<br><h2>检查IPaint接口是否存在</h2>接口调用成功<br>");


//class_exists() 检查类是否已定义
class A5Paper{
    var $name;

    function __construct($name){
        $this->name = $name;
    }

    function showName(){
        echo $this->name . "<br>";
    }
}

// 使用前检查类是否存在
if (class_exists('A5Paper')) {
    $a5 = new A5Paper("Hello A5!");

    // property_exists 检查对象或类是否具有该属性
    if(property_exists("A5Paper", "name")){

        // method_exists 检查类的方法是否存在
        if(method_exists($a5, "showName")){
            echo "<h2>检查类、属性、方法是否存在</h2>";
            $a5->showName();
        }else{
            echo "method 不存在 <br>";
        }
    }else{
        echo "property 不存在 <br>";
    }
}else{
    echo "class 不存在 <br>";
}



echo "<h3>返回所有编译并加载的模块名</h3>";
echo "<pre>";
print_r(get_loaded_extensions());
echo "</pre>";

echo "<h3>检查一个扩展是否已经加载 [mysqli]</h3>";
var_dump(extension_loaded('mysqli')); echo "<br>";

echo "<h3>返回模块函数名称的数组 [mysqli]</h3>";
echo "<pre>";
print_r(get_extension_funcs("mysqli"));
echo "</pre>";

echo "<h3>所有已定义的函数</h3>";
echo "<pre>";
print_r(get_defined_functions());
echo "</pre>";