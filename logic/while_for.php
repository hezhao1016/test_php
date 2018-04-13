<?php
/** 循环
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 17:16
 */

/*
在 PHP 中，提供了下列循环语句：
while - 只要指定的条件成立，则循环执行代码块
do...while - 首先执行一次代码块，然后在指定的条件成立时重复这个循环
for - 循环执行代码块指定的次数
foreach - 根据数组中每个元素来循环代码块
*/


echo "<p>-------------while--------------</p>";
$i = 1;
while ($i <= 5){
    echo "The Number is " . $i . "<br>";
    $i++;
}


echo "<p>-------------do while--------------</p>";
$i = 1;
do{
    echo "The Number is " . $i . "<br>";
}while($i < 1);


echo "<p>-------------for--------------</p>";
$i = 1;
for ($i = 1; $i<= 5; $i++){
    echo "The Number is " . $i . "<br>";
}


echo "<p>-------------foreach--------------</p>";
$array = [1, 2, 3, 4, 5];
foreach ($array as $value) {
    echo "The Number is " . $value . "<br>";
}