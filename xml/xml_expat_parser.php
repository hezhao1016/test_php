<?php
/** PHP XML Expat 解析器
 * Created by PhpStorm.
 * User: hezhao
 * Date: 2018/5/1 23:40
 */

//有两种基本的 XML 解析器类型：
//基于树的解析器：这种解析器把 XML 文档转换为树型结构。它分析整篇文档，并提供了对树中元素的访问，例如文档对象模型 (DOM)。
//基于事件的解析器：将 XML 文档视为一系列的事件。当某个具体的事件发生时，解析器会调用函数来处理。
//Expat 解析器是基于事件的解析器。

// 解析器
$parser = xml_parser_create();

function start($parser,$element_name,$element_attrs){
    switch($element_name){
        case "NOTE":
            echo "-- Note --<br>";
            break;
        case "TO":
            echo "To: ";
            break;
        case "FROM":
            echo "From: ";
            break;
        case "HEADING":
            echo "Heading: ";
            break;
        case "BODY":
            echo "Message: ";
    }
}

function stop($parser,$element_name){
    echo "<br>";
}

function char($parser,$data){
    echo $data;
}

//设置解析函数
xml_set_element_handler($parser,"start","stop");
xml_set_character_data_handler($parser,"char");

$fp = fopen(__DIR__ . "/../files/test.xml","r");

while ($data = fread($fp,1024)){
    xml_parse($parser,$data,feof($fp)) or
    die (sprintf("XML Error: %s at line %d", xml_error_string(xml_get_error_code($parser)), xml_get_current_line_number($parser)));
}

xml_parser_free($parser);

/*
工作原理：
1.通过 xml_parser_create() 函数初始化 XML 解析器
2.创建配合不同事件处理程序的的函数
3.添加 xml_set_element_handler() 函数来定义，当解析器遇到开始和结束标签时执行哪个函数
4.添加 xml_set_character_data_handler() 函数来定义，当解析器遇到字符数据时执行哪个函数
5.通过 xml_parse() 函数来解析文件 "test.xml"
6.万一有错误的话，添加 xml_error_string() 函数把 XML 错误转换为文本说明
7.调用 xml_parser_free() 函数来释放分配给 xml_parser_create() 函数的内存
*/