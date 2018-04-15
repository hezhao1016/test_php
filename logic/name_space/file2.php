<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/15 0:12
 */

namespace Foo\Bar;

// 引入PHP文件
include 'file1.php';

const FOO = 2;
function foo() {
    echo 'Foo\Bar\foo is run! <br>';
}
class foo
{
    static function staticmethod() {
        echo 'Foo\Bar\foo\staticmethod is run! <br>';
    }
}

/* 非限定名称 */
foo(); // 解析为 Foo\Bar\foo resolves to function Foo\Bar\foo
foo::staticmethod(); // 解析为类 Foo\Bar\foo的静态方法staticmethod。resolves to class Foo\Bar\foo, method staticmethod
echo FOO . '<hr>'; // resolves to constant Foo\Bar\FOO

/* 限定名称 */
subnamespace\foo(); // 解析为函数 Foo\Bar\subnamespace\foo
subnamespace\foo::staticmethod(); // 解析为类 Foo\Bar\subnamespace\foo,
// 以及类的方法 staticmethod
echo subnamespace\FOO . '<hr>'; // 解析为常量 Foo\Bar\subnamespace\FOO

/* 完全限定名称 */
\Foo\Bar\foo(); // 解析为函数 Foo\Bar\foo
\Foo\Bar\foo::staticmethod(); // 解析为类 Foo\Bar\foo, 以及类的方法 staticmethod
echo \Foo\Bar\FOO . '<hr>'; // 解析为常量 Foo\Bar\FOO