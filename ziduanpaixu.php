<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2017/1/12
 * Time: 10:55
 */


//根据某个字段排序
$past = array(
   array('name'=>'h','createtime'=>1007),
   array('name'=>'g','createtime'=>1006),
   array('name'=>'c','createtime'=>1002),
   array('name'=>'f','createtime'=>1005),
   array('name'=>'e','createtime'=>1004),
   array('name'=>'d','createtime'=>1003),
   array('name'=>'b','createtime'=>1001),
   array('name'=>'a','createtime'=>1000),
);

$createtime = array();
foreach($past as $arr2){
   $createtime[]=$arr2["createtime"];
}
array_multisort($createtime, SORT_ASC, $past);
print_r($past);