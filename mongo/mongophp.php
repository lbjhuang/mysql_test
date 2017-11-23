<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/24
 * Time: 14:44
 */
$m = new MongoClient();
$db = $m->test;
$col = $db->createCollection("NBA");  //创建一个NBA的集合给变量$col
$west = array('maci'=>'马刺','rockets'=>'火箭',);
$col->insert($west);  //插入数据