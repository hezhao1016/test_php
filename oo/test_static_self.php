<?php
/** static 和 self
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/29 23:39
 */

/*
相同点：
1.new static()是在PHP5.3版本中引入的新特性。
2.无论是new static()还是new self()，都是new了一个新的对象。

不同点：
1.只有在继承中才能体现出来，如果没有任何继承，那么这两者是没有区别的。
2.new self()返回的实例是万年不变的，无论谁去调用，都返回同一个类的实例，而new static()则是由调用者决定的。
*/

class A {
    public static function get_self() {
        return new self();
    }

    public static function get_static() {
        return new static();
    }
}

class B extends A {}

echo get_class(B::get_self()) . "<br>"; // A
echo get_class(B::get_static()) . "<br>"; // B
echo get_class(A::get_static()) . "<br>"; // A




class ATest {
    public function say(){
        echo 'Father'  . "<br>";
    }
    public function callSelf(){
        self::say();
    }
    public function callStatic(){
        static::say();
    }
}

class BTest extends ATest {
    public function say(){
        echo 'Kids'  . "<br>";
    }
}

$b = new BTest();
$b->say(); // Kids
$b->callSelf(); // Father
$b->callStatic(); // Kids



// 使用 self 如何 实现 static 的效果?
class Person {
    public function create1() {
        $class = get_class($this); // get_class() 获取类名
        return new $class();
    }
    public function create2() {
        return new static();
    }
}

class Man extends Person {}

$b = new Man();
var_dump(get_class($b->create1()), get_class($b->create2())); // string(3) "Man" string(3) "Man"
echo "<br>";


/*
get_class() 、 get_called_class() 和 __CLASS__ 区别
1、__CLASS__是静态绑定的，在子类中获取到的依然是父类的名称
2、get_class()用于实例调用，加入参数($this)可解决子类继承调用的问题
3、get_called_class()则是用于静态方法调用，即 后期静态绑定类的名称
注意：虽说get_called_class()是用于静态方法调用，但它也可用于类的非静态方法中，但必须强调一点，get_called_class()所处的函数必须在类里面；
*/
abstract class foo {
    public function __construct(){
        var_dump(get_class($this));
        var_dump(get_class());
        echo "<br>";
    }

    static public function test() {
        var_dump(get_called_class());
        echo "<br>";
    }
}

class bar extends foo {
}

new bar; // string(3) "bar" string(3) "foo"
foo::test(); // string(3) "foo"
bar::test(); // string(3) "bar"
