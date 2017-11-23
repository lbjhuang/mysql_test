<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/15
 * Time: 17:51
 */
/**
 * 敏感词过滤
 * @param $words
 * @return array
 */

$file = "./word.txt";
$badword = file_get_contents($file); //该文本中为敏感词汇,共有将近4000个
$blacklist="/".$badword."/i";
$str="一个国家哈哈大笑";
if(preg_match($blacklist, $str, $matches)){
   print "found:". $matches[0];
} else {
   print "not found.";
}
//if (preg_match ("/hi/i", "Welcome to hi-docs.com.")) {
//   echo "A match was found.";
//} else {
//   echo "A match was not found.";
//}
//?>