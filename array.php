<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/15
 * Time: 11:52
 */
$password = "";
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
while (strlen($password) < 6) {
   $password .= substr($chars, (mt_rand() % strlen($chars)), 1);
}
var_dump($password);