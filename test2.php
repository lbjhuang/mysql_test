<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/12/20
 * Time: 10:14
 */
//$str='gawwenngeeojjgegop';
//$pattern='/(.)\1/';
//$str=preg_replace($pattern,'',$str);
//echo $str;
//$pdt = "153:12";
//$index = strpos($pdt, ':');
//echo $index;echo "<br>";
//$num = substr($pdt,0,$index); // "12"
//$num2 = substr($pdt,$index);  // ":12"
//echo $num;

// 未登录

$array1 = array(array('name'=>'niqiu','price'=>'100'),array('name'=>'huangshan','price'=>'130'),array('name'=>'jiayu','price'=>'200'));

foreach ($array1 as $key => &$value) {
//   if(in_array('1', $array1)) {
//      array_splice($array1, $key, 1);
//      continue;
//   }
   $value['count'] = 20;
}
var_dump($array1);