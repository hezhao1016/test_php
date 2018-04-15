<?php
/** 析构函数
 * 析构函数(destructor) 与构造函数相反，当对象结束其生命周期时（例如对象所在的函数已调用完毕），系统自动执行析构函数。
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 0:07
 */

class MyDestructableClass{

    public function __construct(){
        echo "执行构造函数<br>";
        $this->name = "MyDestructableClass";
    }

    public function __destruct(){
        echo "销毁" . $this->name . "<br>";
    }
}

$obj = new MyDestructableClass();