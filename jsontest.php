<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/12/15
 * Time: 17:51
 */
$data = array(array('id'=>9,'name'=>'还我漂漂拳'),array('id'=>10,'name'=>'给你漂漂拳'));
//var_dump($data);
unset($data[0]);
$data = array_values($data);
$data2 = json_encode($data, JSON_UNESCAPED_UNICODE);
//var_dump($data);

var_dump($data2);