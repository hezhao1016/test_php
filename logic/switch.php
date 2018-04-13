<?php
/** switch 语法
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018-04-13 11:37
 */

$favcolor = "blue";

switch ($favcolor){
    case "red":
        echo "红色";
        break; // 这里和Java一样，如果没有break 将会贯穿
    case "blue":
        echo "蓝色";
        break;
    default:
        echo "未知颜色";
}

