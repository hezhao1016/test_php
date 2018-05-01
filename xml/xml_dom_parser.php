<?php
/** PHP DOM 解析
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/2 0:08
 */

$xmlDoc = new DOMDocument();
$xmlDoc->load(__DIR__ . "/../files/test.xml");

// 输出完整XML
echo $xmlDoc->saveXML() . "<br><br>";

// 遍历XML
$x = $xmlDoc->documentElement;
foreach ($x->childNodes as $item) {
    echo $item->nodeName . " = " . $item->nodeValue . "<br>";
}



