<?php
/** 异常处理
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-26 11:51
 */

//PHP 7 错误处理
/*
PHP 7 改变了大多数错误的报告方式。不同于 PHP 5 的传统错误报告机制，现在大多数错误被作为 Error 异常抛出。
这种 Error 异常可以像普通异常一样被 try / catch 块所捕获。如果没有匹配的 try / catch 块， 则调用异常处理函数（由 set_exception_handler() 注册）进行处理。 如果尚未注册异常处理函数，则按照传统方式处理：被报告为一个致命错误（Fatal Error）。
Error 类并不是从 Exception 类 扩展出来的，所以用 catch (Exception $e) { ... } 这样的代码是捕获不 到 Error 的。你可以用 catch (Error $e) { ... } 这样的代码，或者通过注册异常处理函数（ set_exception_handler()）来捕获 Error。

异常层次结构
Throwable
    Error
        ArithmeticError
        AssertionError
        DivisionByZeroError
        ParseError
        TypeError
        ...
    Exception
        LogicException
        RunTimeException
        ...
*/

// PHP 7 异常实例
try{
    // 除数为 0，抛出异常
    $value = 1 % 0;
    echo "正常输出" . $value . "<br>";
}catch (Error $e){
    echo "出现异常：" . $e->getMessage() . "<br>";
}


//异常的基本使用
//当异常被抛出时，其后的代码不会继续执行，PHP 会尝试查找匹配的 "catch" 代码块。
//如果异常没有被捕获，而且又没用使用 set_exception_handler() 作相应的处理的话，那么将发生一个严重的错误（致命错误），并且输出 "Uncaught Exception" （未捕获异常）的错误消息。
function checkNum($number){
    if($number > 1){
        // 每一个 throw 必须对应至少一个 catch
        throw new Exception("变量值必须小于等于1");
    }
    return true;
}

try{
    checkNum(2);
    echo "正常输出" . "<br>";
}catch (Exception $e){
    echo "出现异常：" . $e->getMessage() . "<br>";
}


//创建一个自定义的 Exception 类
class EmailException extends Exception{
    public function errorMessage(){
        // 错误信息
        $errorMsg = '错误行号 '.$this->getLine().' in '.$this->getFile() .': <b>'.$this->getMessage().'</b> 不是一个合法的 E-Mail 地址';
        return $errorMsg;
    }
}

//$email = "someone@example...com";
$email = "someone@example.com";

try{
    // 检测邮箱
    if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
        // 如果邮箱格式不正确，抛出异常
        throw new EmailException($email);
    }
    // 检测 "example" 是否在邮箱地址中
    if(strpos($email,"example") !== false){
        throw new Exception("$email 是 example 邮箱");
    }
}catch (EmailException $e){
    echo "出现异常：" . $e->errorMessage() . "<br>";
}catch (Exception $e){
    echo "出现异常：" . $e->getMessage() . "<br>";
}


$email = "someone@example...com";
//重新抛出异常
try{
    try{
        // 检测邮箱
        if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
            // 如果邮箱格式不正确，抛出异常
            throw new Exception($email);
        }
    }catch (Exception $e){
        throw new EmailException($email);
    }
}catch (EmailException $e){
    // 显示自定义信息
    echo "出现异常：" . $e->errorMessage() . "<br>";
}

// try-catch-finally
//try内部正常执行try的内部逻辑，异常则执行catch的内部逻辑结构，但是不管执行的哪个都会执行完try catch的内部逻辑（非return）后执行finally的内部逻辑。
//如果try catch都有return，按照正常执行，然后执行finally的逻辑，再返回对应的try 或者catch里执行return。
//如果try catch finally都有return，执行完finally的逻辑后，会调用finally的return。
class test{
    public function testTry(){
        $i = 0;
        try {
            $i += 1;
            throw new Exception();
            return $i;
        } catch (Exception $e) {
            $i += 2;
            return $i;
        } finally {
            $i += 3;
            return $i; // 当finally有return的时候 返回这个，当注销后，返回try 或者是 catch的内容。
        }
    }
}

$b = new test();
echo $b->testTry() . "<br>";



//设置顶层异常处理器
//set_exception_handler() 函数可设置处理所有未捕获异常的用户定义函数。
function myException($exception){
    echo "<b>Exception:</b>" . $exception->getMessage();
}
set_exception_handler(myException);

//$value = 1 % 0;
throw new Exception("未经处理的异常");

//异常的规则
//需要进行异常处理的代码应该放入 try 代码块内，以便捕获潜在的异常。
//每个 try 或 throw 代码块必须至少拥有一个对应的 catch 代码块。
//使用多个 catch 代码块可以捕获不同种类的异常。
//可以在 try 代码块内的 catch 代码块中抛出（再次抛出）异常。
//简而言之：如果抛出了异常，就必须捕获它。