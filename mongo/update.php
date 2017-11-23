<?php
$m = new MongoClient();  
$db = $m->test;   //选择数据库
$col = $db->NBA;  //选择集合
$col->update(array('maci'=>"马刺"),array('$set'=>array("maci"=>'小牛')));
$result = $col->find();  //查找并遍历
foreach ($result as $key => $value) {
	echo $value['maci'];
}
