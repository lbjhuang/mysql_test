<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/16
 * Time: 9:05
 */
//if(preg_match("/a7M/","a7M"))  echo "匹配";  else echo "不匹配";
//if(preg_match("/a.c/","a2c"))  echo "匹配";  else echo "不匹配";
//if(preg_match("/Chapter[0-9]/","Chapter223",$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/Chapter[0-9][a-z]?/","Chapter2adss",$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/Chapter[0-9][a-z]?/","Chapter2adss",$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/^\d$/",12,$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/^\d{0,8}$/",12412132,$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/^\d{3,6}$/",1222,$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/^\d*$/","1s2",$match))  echo $match[0];  else echo "不匹配";    //只能匹配数字
//if(preg_match("/^\d+.\d{3}$/",12.123,$match))  echo $match[0];  else echo "不匹配";   //匹配3位小数点的正实数
//if(preg_match("/^\+?[1-9][0-9]*$/",+2,$match))  echo $match[0];  else echo "不匹配";    //匹配正整数,负整数则+变成-
//if(preg_match("/^\d$/",12,$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/.{3}/",112,$match))  echo $match[0];  else echo "不匹配";    //匹配3个字符
//if(preg_match("/[a-zA-Z]+/","jkjk",$match))  echo $match[0];  else echo "不匹配";  //英文字符
//if(preg_match("/[a-zA-Z0-9]+/","12fds",$match))  echo $match[0];  else echo "不匹配";   //匹配英文和数字
//if(preg_match("/\w*/",1,$match))  echo $match[0];  else echo "不匹配";
//if(preg_match("/^[A-Z]\w+/","Ahjhj",$match))  echo $match[0];  else echo "不匹配";    //首字母大写
//if(preg_match_all("/\\\\[5]/","\\5",$match))  var_dump($match[0]);  else echo "不匹配";
//if(preg_match("/C:\\[Windows]+/","C:\Windows",$match))  var_dump($match);  else echo "不匹配";
//if(preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ","867999-jj@q-q.com",$match))  var_dump($match[0]);  else echo "不匹配";   //邮件匹配
//if(preg_match("/(http|ftp|https):\/\/([\w-]+\.)+[\w-]+(\/[\w-\.\/\?%&=]*)?/ ","https://www.baidu.com",$match))  var_dump($match[0]);  else echo "不匹配";   //网址匹配




/**
 * 对多位数组进行排序
 * @param $multi_array 数组
 * @param $sort_key需要传入的键名
 * @param $sort排序类型
 */
function multi_array_sort($multi_array, $sort_key, $sort = SORT_DESC) {
   if (is_array($multi_array)) {
      foreach ($multi_array as $row_array) {
         if (is_array($row_array)) {
            $key_array[] = $row_array[$sort_key];
         } else {
            return FALSE;
         }
      }
   } else {
      return FALSE;
   }
   array_multisort($key_array, $sort, $multi_array);
   var_dump($multi_array);
}

$ret = array(
   array('name'=>'sandy','comments'=>'还可以呀','replytime'=>5),
   array('name'=>'paul','comments'=>'黑黑压压','replytime'=>0),
   array('name'=>'sam','comments'=>'嘻嘻哈哈','replytime'=>0),
   array('name'=>'list','comments'=>'发货太慢了','replytime'=>15),
   array('name'=>'where','comments'=>'啦啦啦啦','replytime'=>30),
   array('name'=>'tim','comments'=>'不不一样','replytime'=>20)
);
$replytime = 'replytime';
multi_array_sort($ret,$replytime);




























