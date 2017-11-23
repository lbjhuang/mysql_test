<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/28
 * Time: 16:11
 */
$cnt = array();
if(isset($_POST['data']) && $_POST['data']){
   $cnt = $_POST['data'];
}
$_POST = json_encode($_POST);
var_dump($_POST);