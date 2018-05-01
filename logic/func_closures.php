<?php
/** 匿名函数/闭包函数
 * http://www.php.net/manual/zh/functions.anonymous.php
 * https://www.cnblogs.com/iforever/p/6439852.html
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-28 19:35
 */

// 匿名函数示例
echo preg_replace_callback('~-([a-z])~', function ($match) {
        return strtoupper($match[1]);
}, 'hello-world') . "<br>"; // 输出 helloWorld


// 匿名函数变量赋值示例
//闭包函数作为变量的值来使用。PHP 会自动把此种表达式转换成内置类 Closure 的对象实例，结尾要加分号
$nimingFunc = function ($name){
    echo "匿名函数被调用 [$name] <br>";
};
$nimingFunc("Horace");


//闭包可以从父作用域中继承变量。 任何此类变量都应该用 use 语言结构传递进去。 PHP 7.1 起，不能传入此类变量： superglobals、 $this 或者和参数重名
$message = 'hello';

// 没有 "use" 报错
$example = function () {
//    return $message . "<br>";
};
echo $example();

// 继承 $message
$example = function () use ($message) {
    return $message . "<br>";
};
echo $example();

// 还是输出hello，因为 闭包函数继承的变父作用域变量必须在函数或类的头部声明
$message = 'world';
echo $example();

$message = 'Hello';
// 使用引用传递，可以改变值
$example = function () use (&$message) {
    return $message . "<br>";
};
echo $example();

// 输出world
$message = 'world';
echo $example();

// 匿名函数带参数，以及从父作用域继承变量
$example = function ($arg) use ($message) {
    return $arg . " " . $message . "<br>";
};
echo $example("hello");



//使用Closure类创建匿名函数
class T {
    private function show(){
        echo "我是T里面的私有函数：show<br>";
    }

    protected  function who(){
        echo "我是T里面的保护函数：who<br>";
    }

    public function name(){
        echo "我是T里面的公共函数：name<br>";
    }
}

$test = new T();

// 创建匿名函数，绑定T对象
$func = Closure::bind(function(){
    $this->who();
    $this->name();
    $this->show();
}, $test,T::class);

$func();


// 传递参数,不依赖任何对象
$func2 = Closure::bind(function($msg){
    echo $msg . "<br>";
},null);

$func2("Hello");



//PHP 7 的 Closure::call() 有着更好的性能，将一个闭包函数动态绑定到一个新的对象实例并调用执行该函数。
class A {
    private $x = 1;
}

// PHP 7 之前版本定义闭包函数代码
$getXCB = function() {
    return $this->x;
};
// 闭包函数绑定到类 A 上
$getX = $getXCB->bindTo(new A, 'A');
echo $getX();
print("<br>");

// PHP 7+ 代码
$getX = function() {
    return $this->x;
};
echo $getX->call(new A);