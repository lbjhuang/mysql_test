<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/29
 * Time: 9:47
 */
$str = "lww123";
$str = md5($str);
echo $str;
echo "<br>";
$s2 = strtolower($str);
echo $s2;