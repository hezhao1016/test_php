<?php
/** 标量类型与返回值类型声明
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/14 16:37
 */

/*
默认情况下，所有的PHP文件都处于弱类型校验模式。
PHP 7 增加了标量类型声明的特性，标量类型声明有两种模式:
    1.强制模式 (默认)
    2.严格模式
在严格模式中，只有一个与类型声明完全相符的变量才会被接受，否则将会抛出一个TypeError。 唯一的一个例外是可以将integer传给一个期望float的函数。
要使用严格模式，一个 declare 声明指令必须放在文件的顶部。这意味着严格声明标量是基于文件可配的。 这个指令不仅影响参数的类型声明，也影响到函数的返回值声明。

标量类型声明语法格式：
declare(strict_types=1);

代码中通过指定 strict_types的值（1或者0），默认为0。1表示严格类型校验模式，作用于函数调用和返回语句；0表示弱类型校验模式。
可以使用的类型参数有：
int、float、bool、string、interfaces、class、array、callable

*/

// 严格模式，必须写在第一行
declare(strict_types=1);

function sum(int ...$ints){
    return array_sum($ints); // 数组求和
}
// 强制模式下可以运行
//echo sum(2, '3', 4.1) . "<br>";

// 严格模式，必须是int
echo sum(2, 3, 4) . "<br>";


//返回类型声明
//PHP 7 增加了对返回类型声明的支持。 类似于参数类型声明，返回类型声明指明了函数返回值的类型。可用的类型与参数声明中可用的类型相同。
function arraysSum(array ...$arrays): array{
    return array_map(function(array $array): int {
        return array_sum($array);
    }, $arrays);
}

print_r(arraysSum([1,2,3], [4,5,6], [7,8,9]));


// 返回类型声明错误实例
//function returnIntValue(int $value): int{
//    // 由于采用了严格模式，返回值必须是 int，但是计算结果是float，报错
//    return $value + 1.0;
//}
//print(returnIntValue(5));
