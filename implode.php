<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/15
 * Time: 16:21
 */
$words = "hunan";
$hei = array("hu","nan","ren","ha","hei");
$blacklist="/hu|nan|ren|hahei/i";
echo $blacklist;
if(preg_match($blacklist, $words, $matches)){
   echo 415234;
} else {
   echo 7;
}


