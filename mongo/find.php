<?php
$m = new MongoClient();  
$db = $m->test;   //选择数据库
$col = $db->NBA;  //选择集合
$resultobj = $col->find();  //查找出的数据是一个对象，遍历转成数组
foreach ($resultobj as $key => $value) {
	$resultarray[] = $value;
}
var_dump($resultarray);  
