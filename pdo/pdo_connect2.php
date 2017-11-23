<?php
//通过uri形式连接数据库
try{
   $dsn = 'uri:file://D:\xampp\htdocs\mytest\pdo\dsn.txt';  //连接uri指定的pdo配置文件
   $user = 'root';
   $passwd = '';
   $pdo = new PDO($dsn, $user, $passwd);
   var_dump($pdo);
}catch (PDOException $e){
   echo $e->getMessage();
}