<?php
/** JSON 5.2+
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/4/27 1:15
 */

/*
json_encode() 对变量进行 JSON 编码，如果执行成功返回 JSON 数据，否则返回 FALSE
语法
  string json_encode ( $value [, $options = 0 ] )
参数
  value: 要编码的值。该函数只对 UTF-8 编码的数据有效。
  options:由以下常量组成的二进制掩码：JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS, JSON_NUMERIC_CHECK,JSON_PRETTY_PRINT, JSON_UNESCAPED_SLASHES, JSON_FORCE_OBJECT
*/
$arr = ["a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5];
$json = json_encode($arr);
echo $json  . "<br>";

//对象转换为 JSON
class Emp{
    var $name = "";
    var $hobbies = "";
    var $birthdate = "";
}
$e = new Emp();
$e->name = "sachin";
$e->hobbies  = "sports";
$e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 p");
$e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));
echo json_encode($e) . "<br>";

/*
json_decode() 函数用于对 JSON 格式的字符串进行解码，并转换为 PHP 变量。
语法
    mixed json_decode ($json_string [,$assoc = false [, $depth = 512 [, $options = 0 ]]])
参数
    json_string: 待解码的 JSON 字符串，必须是 UTF-8 编码数据
    assoc: 当该参数为 TRUE 时，将返回数组，FALSE 时返回对象。
    depth: 整数类型的参数，它指定递归深度
    options: 二进制掩码，目前只支持 JSON_BIGINT_AS_STRING 。
*/
echo "<pre>";
var_dump(json_decode($json));
echo "</pre><br>";

echo "<pre>";
var_dump(json_decode($json, true));
echo "</pre><br>";



/*
json_last_error() 返回 JSON 编码解码时最后发生的错误
返回一个整型（integer），这个值会是以下的常量之一：
    JSON_ERROR_NONE	                    没有错误发生
    JSON_ERROR_DEPTH	                到达了最大堆栈深度
    JSON_ERROR_STATE_MISMATCH	        无效或异常的 JSON
    JSON_ERROR_CTRL_CHAR	            控制字符错误，可能是编码不对
    JSON_ERROR_SYNTAX	                语法错误
    JSON_ERROR_UTF8	                    异常的 UTF-8 字符，也许是因为不正确的编码。	PHP 5.3.3
    JSON_ERROR_RECURSION	            One or more recursive references in the value to be encoded	PHP 5.5.0
    JSON_ERROR_INF_OR_NAN	            One or more NAN or INF values in the value to be encoded	PHP 5.5.0
    JSON_ERROR_UNSUPPORTED_TYPE	        指定的类型，值无法编码。	PHP 5.5.0
    JSON_ERROR_INVALID_PROPERTY_NAME	指定的属性名无法编码。	PHP 7.0.0
    JSON_ERROR_UTF16	                畸形的 UTF-16 字符，可能因为字符编码不正确。 PHP 7.0.0
*/
// -> 例子1
// 一个有效的 json 字符串
$jsons[] = '{"Organization": "PHP Documentation Team"}';
// 一个无效的 json 字符串会导致一个语法错误，在这个例子里我们使用 ' 代替了 " 作为引号
$jsons[] = "{'Organization': 'PHP Documentation Team'}";
foreach ($jsons as $string) {
    echo 'Decoding: ' . $string;
    json_decode($string);

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - No errors';
            break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
            break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
            break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
            break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
            break;
        default:
            echo ' - Unknown error';
            break;
    }
    echo "<br>";
}

// -> 例子2
// 无效的 UTF8 序列
$text = "\xB1\x31";
$json  = json_encode($text);
$error = json_last_error();
var_dump($json, $error === JSON_ERROR_UTF8);