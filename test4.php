<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/23
 * Time: 11:23
 */
//$s = '__be_li_eve__';
////$s1 = trim($s,'_');  //移走两侧的_     be_li_eve
//$s2 = str_replace('_','',$s);  //去除掉所有_     believe
//
//echo $s2;





//$str =  "我_们_的_=家+园";
//$str = str_replace(array("_","=","+"),"",$str);
//echo  $str;       //我们的家园



# 把up_to_here ---->> 变成UpToHere
//$str = 'up_to_here';
//$str = explode('_', $str);
//foreach($str as $k=>$v){
//    $str[$k] = ucfirst($v);
//}
//$str = implode($str);
//var_dump($str);         // UpToHere

//$a = 3; $b = 4; $c = 5;
//echo max($a,$b,$c);     //min($a,$b,$c);





//echo()
//可以一次输出多个值，多个值之间用逗号分隔。echo是语言结构(language construct)，而并不是真正的函数，因此不能作为表达式的一部分使用。
//
//print()
//函数print()打印一个值（它的参数），如果字符串成功显示则返回true，否则返回false。
//
//print_r()
//可以把字符串和数字简单地打印出来，而数组则以括起来的键和值得列表形式显示，并以Array开头。但print_r()输出布尔值和NULL的结果没有意义，因为都是打印"\n"。因此用var_dump()函数更适合调试。
//
//var_dump()
//判断一个变量的类型与长度,并输出变量的数值,如果变量有值输的是变量的值并回返数据类型。此函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。
$arr = array(1,2,3);
$str = "huangwei";
$str2 = "nihao";
echo $str,$str2;  //echo 是php语句 没有返回值 仅仅做简单变量的输出，可以输出多个字符串，不可以输出复合数据(数组，对象),没有返回值
print($str);//仅仅做简单变量的输出，只能输出一个字符串，不可以输出复合数据(数组，对象),有返回值
print_r($arr);  //可以打印复合数据数据（数组，对象）,不会显示符合数据的每个数据的数据类型,有返回值
var_dump($arr);  //打印任何数据的结构类型和值