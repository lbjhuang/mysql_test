<?php
//通过参数形式连接数据库
try{
   $dsn = 'mysql:host=localhost;dbname=book';  //数据源
   $user = 'root';
   $passwd = '';
   $pdo = new PDO($dsn, $user, $passwd);
   var_dump($pdo);
}catch (PDOException $e){
   echo $e->getMessage();
}