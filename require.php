<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/17
 * Time: 15:45
 */
//echo __DIR__;
//require_once(__DIR__.'/2.php');



$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
var_dump(json_decode($json));
var_dump(json_decode($json, true));


$arr = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);

echo json_encode($arr);
if(0===false){
   echo 123;
}
if(''===false){
   echo 123;
}

?>