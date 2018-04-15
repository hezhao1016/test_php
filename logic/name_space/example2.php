<?php
/**
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/15 0:20
 */

//PHP 命名空间的实现受到其语言自身的动态特征的影响，因此，在动态的类名称、函数名称或常量名称中，必须使用完全限定名称（包括命名空间前缀的类名称）

namespace namespacename;
class classname
{
    function __construct()
    {
        echo __METHOD__,"<br>";
    }
}
function funcname()
{
    echo __FUNCTION__,"<br>";
}
const constname = "namespaced";

include 'example1.php';

$a = 'classname';
$obj = new $a; // prints classname::__construct
$b = 'funcname';
$b(); // prints funcname
echo constant('constname'), "<br>"; // prints global

/* note that if using double quotes, "\\namespacename\\classname" must be used */
$a = '\namespacename\classname';
$obj = new $a; // prints namespacename\classname::__construct
$a = 'namespacename\classname';
$obj = new $a; // also prints namespacename\classname::__construct
$b = 'namespacename\funcname';
$b(); // prints namespacename\funcname
$b = '\namespacename\funcname';
$b(); // also prints namespacename\funcname
echo constant('\namespacename\constname'), "<br>"; // prints namespaced
echo constant('namespacename\constname'), "<br>"; // also prints namespaced