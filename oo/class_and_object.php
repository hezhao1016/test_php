<?php
/** 面向对象
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/15 23:35
 */

class Site{

    // 成员变量
    var $url;
    var $title;

    function setUrl($url){
        // 使用$this访问当前对象，操作符 ->
        $this->url = $url;
    }
    function getUrl(){
        echo $this->url . "<br>";
    }

    function setTitle($par){
        $this->title = $par;
    }

    function getTitle(){
        echo $this->title . "<br>";
    }
}

// 创建对象
$runoob = new Site();
$taobao = new Site;
$google = new Site;

//调用成员方法，设置标题和URL
$runoob->setTitle("菜鸟教程");
$taobao->setTitle( "淘宝" );
$google->setTitle( "Google 搜索" );

$runoob->setUrl("www.runoob.com");
$taobao->setUrl( 'www.taobao.com' );
$google->setUrl( 'www.google.com' );

// 调用成员函数，获取标题和URL
$runoob->getTitle();
$taobao->getTitle();
$google->getTitle();

$runoob->getUrl();
$taobao->getUrl();
$google->getUrl();


//访问控制
//public（公有）：公有的类成员可以在任何地方被访问。
//protected（受保护）：受保护的类成员则可以被其自身以及其子类和父类访问。
//private（私有）：私有的类成员则只能被其定义所在的类访问。

//属性的访问控制
//类属性必须定义为公有，受保护，私有之一。如果用 var 定义，则被视为公有。
/*
class MyClass{
    var $a = "a"; //公有
    public $public = 'Public'; //公有
    protected $protected = 'Protected'; //受保护
    private $private = 'Private'; //私有
}
*/

//方法的访问控制
//类中的方法可以被定义为公有，私有或受保护。如果没有设置这些关键字，则该方法默认为公有。
/*
class MyClass{
    // 声明一个公有的构造函数
    public function __construct() { }

    // 声明一个公有的方法
    public function MyPublic() { }

    // 声明一个受保护的方法
    protected function MyProtected() { }

    // 声明一个私有的方法
    private function MyPrivate() { }

    // 此方法为公有
    function Foo(){
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}
*/
