<?php
/** 数组排序
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 14:58
 */

$cars = array("Volvo","BMW","Toyota");
$numbers = array(4,6,2,22,11);
$age = array("Peter"=>"35","Ben"=>"37","Joe"=>"43");

//sort() - 对数组进行升序排列
sort($cars);
print("<pre>");
print_r($cars);
print("</pre>");

sort($numbers);
print("<pre>");
print_r($numbers);
print("</pre>");


//rsort() - 对数组进行降序排列
rsort($cars);
print("<pre>");
print_r($cars);
print("</pre>");


//asort() - 根据关联数组的值，对数组进行升序排列
asort($age);
print("<pre>");
print_r($age);
print("</pre>");

//ksort() - 根据关联数组的键，对数组进行升序排列
ksort($age);
print("<pre>");
print_r($age);
print("</pre>");

//arsort() - 根据关联数组的值，对数组进行降序排列
arsort($age);
print("<pre>");
print_r($age);
print("</pre>");

//krsort() - 根据关联数组的键，对数组进行降序排列
krsort($age);
print("<pre>");
print_r($age);
print("</pre>");


//冒泡排序
echo "<h2>冒泡排序</h2>";
$nums = [5,10,25,3,50,45,2,75];
for($i = 0; $i < count($nums) - 1;$i++) {
    for($j = 0; $j < count($nums) - 1 - $i;$j++) {
        if($nums[$j] > $nums[$j+1]) {
            $temp = $nums[$j];
            $nums[$j] = $nums[$j+1];
            $nums[$j+1] = $temp;
        }
    }
}
print("<pre>");
print_r($nums);
print("</pre>");
