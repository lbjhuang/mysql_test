<?php
//通过配置文件形式连接数据库 在php.ini添加pdo配置
try{
   $dsn = 'books';
   $user = 'root';
   $passwd = '';
   $pdo = new PDO($dsn, $user, $passwd);
   var_dump($pdo);
}catch (PDOException $e){
   echo $e->getMessage();
}