<?php 
header('content-type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=$_POST['password'];
try{
	$pdo=new PDO('mysql:host=localhost;dbname=imooc','root','root');	
	$sql="select * from user where username=:username and password=:password";
	$stmt=$pdo->prepare($sql);
	$stmt->execute(array(":username"=>$username,":password"=>$password));
	echo $stmt->rowCount();
	
}catch(PDOException $e){
	echo $e->getMessage();
}
