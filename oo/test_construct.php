<?php
/** 构造函数
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 0:07
 */

class Site{

    // 成员变量
    var $url;
    var $title;

    public function __construct($url, $title){
        $this->url = $url;
        $this->title = $title;
    }

    function getUrl(){
        echo $this->url . "<br>";
    }

    function getTitle(){
        echo $this->title . "<br>";
    }
}

// 使用构造函数创建对象
$runoob = new Site("www.runoob.com","菜鸟教程");
$taobao = new Site("www.taobao.com","淘宝");
$google = new Site("www.google.com","Google 搜索");

// 调用成员函数，获取标题和URL
$runoob->getTitle();
$taobao->getTitle();
$google->getTitle();

$runoob->getUrl();
$taobao->getUrl();
$google->getUrl();