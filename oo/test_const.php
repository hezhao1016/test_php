<?php
/** 常量
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/16 1:09
 */

/*
常量
可以把在类中始终保持不变的值定义为常量。在定义和使用常量的时候不需要使用 $ 符号。
常量的值必须是一个定值，不能是变量，类属性，数学运算的结果或函数调用。
常量在定义的同时必须赋初值
常量不能写修饰符，默认是public，但不能写出来
常量名一般全部用大写字母表示
常量是属于 类 的，不是属于某个对象
常量可以被子类继承
在类的内部使用 self::常量的名称  或  类名::常量的名称表示
在类的外部使用  类名::常量的名称表示.

自 PHP 5.3.0 起，可以用一个变量来动态调用类。但该变量的值不能为关键字（如 self，parent 或 static）。
*/

class MyClass{
    const constant = '常量值';

    function showConstant() {
        echo self::constant . "<br>";
    }
}

echo MyClass::constant . "<br>";

$classname = "MyClass";
echo $classname::constant . "<br>"; // 自 5.3.0 起

$class = new MyClass();
$class->showConstant();

echo $class::constant . "<br>"; // 自 PHP 5.3.0 起