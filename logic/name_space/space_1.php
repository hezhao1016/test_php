<?php
/** 命名空间 PHP 5.3+
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/14 23:35
 */

//定义命名空间，默认情况下，所有常量、类和函数名都放在全局空间下
//命名空间通过关键字namespace 来声明。如果一个文件中包含命名空间，它必须在其它所有代码之前声明命名空间
//在声明命名空间之前唯一合法的代码是用于定义源文件编码方式的 declare 语句。所有非 PHP 代码包括空白符都不能出现在命名空间的声明之前。

declare(encoding='UTF-8');

namespace test_name_space_1;

//可以在一个文件中定义多个命名空间
namespace test_name_space_2;

//使用大括号，更清晰
/*
namespace test_name_space_1{
    //...
}
namespace test_name_space_2{
    //...
}
*/

//将全局的非命名空间中的代码与命名空间中的代码组合在一起，只能使用大括号形式的语法。全局代码必须用一个不带名称的 namespace 语句加上大括号括起来，例如：
/*
namespace MyProject {
    const CONNECT_OK = 1;
    class Connection { //... }
    function connect() { // ... }
}
namespace { // 全局代码
    session_start();
    $a = MyProject\connect();
    echo MyProject\Connection::start();
}
*/


//子命名空间
//与目录和文件的关系很象，PHP 命名空间也允许指定层次化的命名空间的名称。因此，命名空间的名字可以使用分层次的方式定义
//namespace MyProject\Sub\Level;  //声明分层次的单个命名空间


//命名空间使用
/*
1.非限定名称，或不包含前缀的类名称
    例如 $a=new foo(); 或 foo::staticmethod();
2.限定名称,或包含前缀的名称
    例如 $a = new subnamespace\foo(); 或 subnamespace\foo::staticmethod();
3.完全限定名称，或包含了全局前缀操作符的名称
    例如， $a = new \currentnamespace\foo(); 或 \currentnamespace\foo::staticmethod();
    访问任意全局类、函数或常量，都可以使用完全限定名称，例如 \strlen() 或 \Exception 或 \INI_ALL。
*/


//PHP支持两种抽象的访问当前命名空间内部元素的方法，__NAMESPACE__ 魔术常量和namespace关键字。

echo __NAMESPACE__ . "<br>";

//使用__NAMESPACE__动态创建名称
function get($classname){
    $a = __NAMESPACE__ . '\\' .$classname;
    return new $a();
}


//关键字 namespace 可用来显式访问当前命名空间或子命名空间中的元素。它等价于类中的 self 操作符。
/*namespace\func(); // calls function func()
namespace\sub\func(); // calls function sub\func()
namespace\cname::method(); // calls static method "method" of class cname
$a = new namespace\sub\cname(); // instantiates object of class sub\cname
$b = namespace\CONSTANT; // assigns value of constant CONSTANT to $b*/


// 别名/导入
//PHP 命名空间支持 有两种使用别名或导入方式：为类名称使用别名，或为命名空间名称使用别名。

//1、使用use操作符导入/使用别名
/*
namespace foo;
use My\Full\Classname as Another;

// 下面的例子与 use My\Full\NSname as NSname 相同
use My\Full\NSname;

// 导入一个全局类
use \ArrayObject;

$obj = new namespace\Another; // 实例化 foo\Another 对象
$obj = new Another; // 实例化 My\Full\Classname　对象
NSname\subns\func(); // 调用函数 My\Full\NSname\subns\func
$a = new ArrayObject(array(1)); // 实例化 ArrayObject 对象
// 如果不使用 "use \ArrayObject" ，则实例化一个 foo\ArrayObject 对象

//2、 一行中包含多个use语句
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化 My\Full\Classname 对象
NSname\subns\func(); // 调用函数 My\Full\NSname\subns\func

//导入操作是在编译执行的，但动态的类名称、函数名称或常量名称则不是。
//3、导入和动态名称
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // 实例化一个 My\Full\Classname 对象
$a = 'Another';
$obj = new $a;      // 实际化一个 Another 对象

//另外，导入操作只影响非限定名称和限定名称。完全限定名称由于是确定的，故不受导入的影响。
//4、导入和完全限定名称。
use My\Full\Classname as Another, My\Full\NSname;

$obj = new Another; // instantiates object of class My\Full\Classname
$obj = new \Another; // instantiates object of class Another
$obj = new Another\thing; // instantiates object of class My\Full\Classname\thing
$obj = new \Another\thing; // instantiates object of class Another\thing
*/


//使用命名空间：后备全局函数/常量
//在一个命名空间中，当 PHP 遇到一个非限定的类、函数或常量名称时，它使用不同的优先策略来解析该名称。类名称总是解析到当前命名空间中的名称。
//因此在访问系统内部或不包含在命名空间中的类名称时，必须使用完全限定名称

//1、在命名空间中访问全局类
/*
namespace A\B\C;
class Exception extends \Exception {}

$a = new Exception('hi'); // $a 是类 A\B\C\Exception 的一个对象
$b = new \Exception('hi'); // $b 是类 Exception 的一个对象

$c = new ArrayObject; // 致命错误, 找不到 A\B\C\ArrayObject 类
*/
//对于函数和常量来说，如果当前命名空间中不存在该函数或常量，PHP 会退而使用全局空间中的函数或常量。


//2、 命名空间中后备的全局函数/常量

namespace A\B\C;

const E_ERROR = 45;
function strlen($str){
    return \strlen($str) - 1;
}

echo E_ERROR, "<br>"; // 输出 "45"
echo INI_ALL, "<br>"; // 输出 "7" - 使用全局常量 INI_ALL

echo strlen('hi'), "<br>"; // 输出 "1"
if (is_array('hi')) { // 输出 "is not array"
    echo "is array<br>";
} else {
    echo "is not array<br>";
}


//全局空间
//如果没有定义任何命名空间，所有的类与函数的定义都是在全局空间，与 PHP 引入命名空间概念前一样。
//在名称前加上前缀 \ 表示该名称是全局空间中的名称，即使该名称位于其它的命名空间中时也是如此。

/*
namespace A\B\C;

//这个函数是 A\B\C\fopen
function fopen() {
    //...
    $f = \fopen(...); // 调用全局的fopen函数
    return $f;
}
*/

//命名空间的顺序
//自从有了命名空间之后，最容易出错的该是使用类的时候，这个类的寻找路径是什么样的了。
/*
namespace A;
use B\D, C\E as F;

// 函数调用

foo();      // 首先尝试调用定义在命名空间"A"中的函数foo()
            // 再尝试调用全局函数 "foo"

\foo();     // 调用全局空间函数 "foo"

my\foo();   // 调用定义在命名空间"A\my"中函数 "foo"

F();        // 首先尝试调用定义在命名空间"A"中的函数 "F"
            // 再尝试调用全局函数 "F"
*/

// 类引用
/*
new B();    // 创建命名空间 "A" 中定义的类 "B" 的一个对象
            // 如果未找到，则尝试自动装载类 "A\B"

new D();    // 使用导入规则，创建命名空间 "B" 中定义的类 "D" 的一个对象
            // 如果未找到，则尝试自动装载类 "B\D"

new F();    // 使用导入规则，创建命名空间 "C" 中定义的类 "F" 的一个对象
            // 如果未找到，则尝试自动装载类 "C\F"

new \B();   // 创建定义在全局空间中的类 "B" 的一个对象
            // 如果未发现，则尝试自动装载类 "B"

new \D();   // 创建定义在全局空间中的类 "D" 的一个对象
            // 如果未发现，则尝试自动装载类 "D"

new \F();   // 创建定义在全局空间中的类 "F" 的一个对象
            // 如果未发现，则尝试自动装载类 "F"

// 调用另一个命名空间中的静态方法或命名空间函数

B\foo();    // 调用命名空间 "A\B" 中函数 "foo"

B::foo();   // 调用命名空间 "A" 中定义的类 "B" 的 "foo" 方法
            // 如果未找到类 "A\B" ，则尝试自动装载类 "A\B"

D::foo();   // 使用导入规则，调用命名空间 "B" 中定义的类 "D" 的 "foo" 方法
            // 如果类 "B\D" 未找到，则尝试自动装载类 "B\D"

\B\foo();   // 调用命名空间 "B" 中的函数 "foo"

\B::foo();  // 调用全局空间中的类 "B" 的 "foo" 方法
            // 如果类 "B" 未找到，则尝试自动装载类 "B"

// 当前命名空间中的静态方法或函数

A\B::foo();   // 调用命名空间 "A\A" 中定义的类 "B" 的 "foo" 方法
            // 如果类 "A\A\B" 未找到，则尝试自动装载类 "A\A\B"

\A\B::foo();  // 调用命名空间 "A\B" 中定义的类 "B" 的 "foo" 方法
            // 如果类 "A\B" 未找到，则尝试自动装载类 "A\B"
*/

/*
名称解析遵循下列规则：
1、对完全限定名称的函数，类和常量的调用在编译时解析。例如 new \A\B 解析为类 A\B。
2、所有的非限定名称和限定名称（非完全限定名称）根据当前的导入规则在编译时进行转换。例如，如果命名空间 A\B\C 被导入为 C，那么对 C\D\e() 的调用就会被转换为 A\B\C\D\e()。
3、在命名空间内部，所有的没有根据导入规则转换的限定名称均会在其前面加上当前的命名空间名称。例如，在命名空间 A\B 内部调用 C\D\e()，则 C\D\e() 会被转换为 A\B\C\D\e() 。
4、非限定类名根据当前的导入规则在编译时转换（用全名代替短的导入名称）。例如，如果命名空间 A\B\C 导入为C，则 new C() 被转换为 new A\B\C() 。
5、在命名空间内部（例如A\B），对非限定名称的函数调用是在运行时解析的。例如对函数 foo() 的调用是这样解析的：
    1、在当前命名空间中查找名为 A\B\foo() 的函数
    2、尝试查找并调用 全局(global) 空间中的函数 foo()。
6、在命名空间（例如A\B）内部对非限定名称或限定名称类（非完全限定名称）的调用是在运行时解析的。下面是调用 new C() 及 new D\E() 的解析过程：
new C()的解析:
    1、在当前命名空间中查找A\B\C类。
    2、尝试自动装载类A\B\C。
new D\E()的解析:
    1、在类名称前面加上当前命名空间名称变成：A\B\D\E，然后查找该类。
    2、尝试自动装载类 A\B\D\E。
为了引用全局命名空间中的全局类，必须使用完全限定名称 new \C()。
*/