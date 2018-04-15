<?php
/** Final
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 1:16
 */

//PHP 5 新增了一个 final 关键字。
//如果父类中的方法被声明为 final，则子类无法覆盖该方法。
//如果一个类被声明为 final，则不能被继承。
//注意：属性不能被定义为 final

class BaseClass {
    public function test() {
        echo "BaseClass::test() called" . PHP_EOL;
    }

    final public function moreTesting() {
        echo "BaseClass::moreTesting() called"  . PHP_EOL;
    }
}

class ChildClass extends BaseClass {
//    public function moreTesting() {
//        echo "ChildClass::moreTesting() called"  . PHP_EOL;
//    }
}
// 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()



final class BaseClass2 {
    public function test() {
        echo "BaseClass::test() called\n";
    }

    // 这里无论你是否将方法声明为final，都没有关系
    final public function moreTesting() {
        echo "BaseClass::moreTesting() called\n";
    }
}

//class ChildClass2 extends BaseClass2 {
//}
// 报错信息 Fatal error: Cannot override final method BaseClass::moreTesting()