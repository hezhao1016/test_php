<?php
/** 面向对象
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 0:17
 */

/*
继承，PHP只支持单继承
多态、方法重写
注意：PHP不支持重载！

接口，通过 interface 关键字来定义。实现一个接口，使用 implements 操作符。类可以实现多个接口，用逗号来分隔多个接口的名称。

抽象类，不能被实例化，继承一个抽象类的时候，子类必须定义父类中的所有抽象方法；另外，这些方法的访问控制必须和父类中一样（或者更为宽松）。类型和所需参数数量必须一致。
*/

// 抽象动物类
abstract class Animal{
    var $name;

    public function __construct(){
        echo "执行父类构造方法<br>";
    }

    abstract protected  function play();
}

// 飞的能力
interface IFly{
    public function fly();
}

// 跑步的能力
interface IRun{
    public function running();
}

class Dog extends Animal implements IRun {

    public function __construct($name){
        // 调用父类构造行数
        // 如果子类没写构造函数，会自动调用父类无参构造函数
        // 如果子类写了构造函数，不会自动调用父类构造函数，如果要调用，需要写 parent::__construct();
        // 这一点和Java不同，Java即使子类写了构造函数还是会调用父类无参构造！
        parent::__construct();
        $this->name = $name;
    }

    public function play(){
        echo "小狗[" . $this->name ."]在玩棒球！<br>";
    }

    public function running(){
        echo "小狗[" . $this->name ."]在跑步！<br>";
    }
}

class Bird extends Animal implements IFly {

    public function __construct($name){
        parent::__construct();
        $this->name = $name;
    }

    public function play(){
        echo "小鸟[" . $this->name ."]在玩乒乓球！<br>";
    }

    public function fly(){
        echo "小鸟[" . $this->name ."]在飞翔！<br>";
    }
}

$dog = new Dog("旺财");
$dog->play();
$dog->running();

$bord = new Bird("小榄");
$bord->play();
$bord->fly();
