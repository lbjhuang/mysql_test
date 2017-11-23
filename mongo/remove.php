<?php
$m = new MongoClient();  
$db = $m->test;   //选择数据库
$col = $db->NBA;  //选择集合
$col->remove(array('maci'=>"马刺"),array("justOne"=>true));
$result = $col->find();  //查找并遍历
foreach ($result as $key => $value) {
	echo $value['maci'];
}
