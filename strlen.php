<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/30
 * Time: 9:44
 */
//店名的字符串长度计算，排除不符合要求的
function strlength($str)
{
   preg_match_all("/./us", $str, $matches);
   return count(current($matches));
}

$str = "go突破自己de极限com";
echo strlength($str);