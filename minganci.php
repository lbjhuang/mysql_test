<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/15
 * Time: 17:51
 */
/**
 * ���дʹ���
 * @param $words
 * @return array
 */

$file = "./word.txt";
$badword = file_get_contents($file); //���ı���Ϊ���дʻ�,���н���4000��
$blacklist="/".$badword."/i";
$str="һ�����ҹ�����Ц";
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