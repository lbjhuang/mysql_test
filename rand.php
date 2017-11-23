<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/12/16
 * Time: 15:39
 */

//随机数字
function randCode($num = 6)
{
   $code = '';
   for ($i = 0; $i < $num; $i++) {
      if ($i == 0) {
         $code .= mt_rand(1, 9);
      } else {
         $code .= mt_rand(0, 9);
      }
   }
   echo  $code;
}

//随机字符串和数字组合
function getRandom($param){
   $str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $key = "";
   for($i=0;$i<$param;$i++)
   {
      $key .= $str[mt_rand(0,61)];    //生成php随机数和字母的组合
   }
   echo  $key;
}
//getRandom(6);
//randCode();


//随机字符和数字等
function rand_word($num=12){
   $re = '';
   $list = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ~0123456789#$%^&";
   $list = str_split($list);
   $key = array_rand($list, $num);
   foreach($key as $value){
      $re .= $list[$value];
   }
   echo $re;
}
rand_word();