<?php
$pdo = new PDO('mysql:host=localhost;dbname=book','root','');

//exec的增删改
//exec()执行一条sql语句并返回受影响的行数---对select不起作用
//$sql = <<<EOF
//CREATE TABLE IF NOT EXISTS user(
//		id INT UNSIGNED AUTO_INCREMENT KEY,
//		username VARCHAR(20) NOT NULL UNIQUE,
//		password CHAR(32) NOT NULL,
//		email VARCHAR(30) NOT NULL
//		);
//
//EOF;
//$sql = "INSERT user(username, password, email) values('king4', '123456','867999030@qq.com')";
//$sql = "UPDATE user SET username='dahuang' WHERE id=1";
$sql = "DELETE from user WHERE id=1";
try {
   $res = $pdo->exec($sql);
   echo "最后插入到数据表记录的id是".$pdo->lastInsertId();   //最后插入到数据表记录的id
}catch (PDOException $e){
   echo $e->getMessage();
}