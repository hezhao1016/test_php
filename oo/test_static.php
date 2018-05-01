<?php
/** Static
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 1:12
 */

/*
Static 关键字
声明类属性或方法为 static(静态)，就可以不实例化类而直接访问。
静态属性不能通过一个类已实例化的对象来访问（但静态方法可以）。
由于静态方法不需要通过对象即可调用，所以伪变量 $this 在静态方法中不可用。
静态属性不可以由对象通过 -> 操作符来访问。

self可以访问本类中的静态属性和静态方法，可以访问父类中的静态属性和静态方法,可以访问const定义的常量
*/

class Foo {
    public static $my_static = 'foo';

    public function staticValue() {
        return self::$my_static;
    }
}

print Foo::$my_static . "<br>";

$foo = new Foo();
print $foo->staticValue() . "<br>";