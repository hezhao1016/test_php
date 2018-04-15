<?php
/** 魔术变量
 *
 * PHP 向它运行的任何脚本提供了大量的预定义常量。
 * 不过很多常量都是由不同的扩展库定义的，只有在加载了这些扩展库时才会出现，或者动态加载后，或者在编译时已经包括进去了。
 * 有八个魔术常量它们的值随着它们在代码中的位置改变而改变。
 *
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/14 17:23
 */

namespace MyProject;

// __LINE__ 文件中的当前行号
echo '这是第 " ' . __LINE__ . ' " 行<br>';

// __FILE__
//文件的完整路径和文件名。如果用在被包含文件中，则返回被包含的文件名。
//自 PHP 4.0.2 起，__FILE__ 总是包含一个绝对路径（如果是符号连接，则是解析后的绝对路径），而在此之前的版本有时会包含一个相对路径。
echo '当前脚本文件位于 " ' . __FILE__ . ' " <br>';

// __DIR__
//文件所在的目录。如果用在被包括文件中，则返回被包括的文件所在的目录。
//它等价于 dirname(__FILE__)。除非是根目录，否则目录中名不包括末尾的斜杠。（PHP 5.3.0中新增）
echo '当前脚本文件位于 " ' . __DIR__ . ' " 目录 <br>';

//__FUNCTION__
//函数名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该函数被定义时的名字（区分大小写）。在 PHP 4 中该值总是小写字母的。
function getFuncName(){
    echo '当前运行的函数名称是： ' . __FUNCTION__ . ' <br>';
}
getFuncName();

//__CLASS__
//类的名称（PHP 4.3.0 新加）。自 PHP 5 起本常量返回该类被定义时的名字（区分大小写）。
//在 PHP 4 中该值总是小写字母的。类名包括其被声明的作用区域（例如 Foo\Bar）。
//注意自 PHP 5.4 起 __CLASS__ 对 trait 也起作用。当用在 trait 方法中时，__CLASS__ 是调用 trait 方法的类的名字。
class test{
    function _print(){
        echo '类名是： ' . __CLASS__ . ' <br>';
        echo '函数名是： ' . __FUNCTION__ . ' <br>';
    }
}
$t1 = new test;
$t1->_print();

//__TRAIT__
//Trait 的名字（PHP 5.4.0 新加）。自 PHP 5.4.0 起，PHP 实现了代码复用的一个方法，称为 traits。
//Trait 名包括其被声明的作用区域（例如 Foo\Bar）。
//从基类继承的成员被插入的 SayWorld Trait 中的 MyHelloWorld 方法所覆盖。其行为 MyHelloWorld 类中定义的方法一致。
//优先顺序是当前类中的方法会覆盖 trait 方法，而 trait 方法又覆盖了基类中的方法。即：子类 > Trait类 > 父类
class Base{
    public function sayHello(){
        echo 'Hello';
    }
}

trait SayWorld{
    public function sayHello(){
        parent::sayHello();
        echo ' World! TraitName is ' . __TRAIT__ . '<br>';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();

//__METHOD__
/*
类的方法名（PHP 5.0.0 新加）。返回该方法被定义时的名字（区分大小写）。
与 __FUNCTION__区别：
情况一:
    __FUNCTION__与__METHOD__ 同处于“类外”的函数体中,他们的返回值是一样一样滴.
情况二:
    __FUNCTION__与__METHOD__ 同处于“类内”的函数体中,__METHOD__ 比 __FUNCTION__前面多了个“类名::”
*/
function test() {
    echo  '函数名为：' . __METHOD__ . '<br>';
}
test();

//__NAMESPACE__
//当前命名空间的名称（区分大小写）。此常量是在编译时定义的（PHP 5.3.0 新增）。
echo '命名空间为：" ', __NAMESPACE__, ' " ' . '<br>'; // 输出 "MyProject"
