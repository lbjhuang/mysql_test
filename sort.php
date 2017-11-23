<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/24
 * Time: 15:46
 */

$a1=array("Dog","Dog","Cat");
$a2=array("Pluto","Fido","Missy");
array_multisort($a1,$a2);
print_r($a1);
print_r($a2);
?>