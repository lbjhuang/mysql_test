<?php
//$str1 = 'yabadabadoo';
//$str2 = 'yaba';
//if (strpos($str1,$str2)) {  //返回0  因为str2在str1的位置是从0开始的数的 0被if语句视为false
//    echo "yes";
//} else {
//    echo "no";
//}

//var_dump(0123 == 123); //视为8进制的数和123比较
//var_dump('0123' == 123);  //强制类型转换成123
//var_dump('0123' === 123); //数据类型不一样

//$text = 'John ';
//$text[10] = 'Doe';
//echo $text;

$x = 3 + "15%" + "$25";
echo $x;  //18 15%被强制类型转化成15  $25强制类型转换成0