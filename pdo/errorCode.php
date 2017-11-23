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
$sql = "DELETE from userss WHERE id=1";  //userss不存在
try {
    $res = $pdo->exec($sql);
    if($res === false){
        echo $pdo->errorCode();  //输出错误状态--字符串42S02
        echo "<br>";
        //array(0=>SQLSTATE, 1=>CODE, 2=>INFO); 错误描述数组
        print_r ($pdo->errorInfo());  //打印错误状态，错误码，错误信息---数组  Array ( [0] => 42S02 [1] => 1146 [2] => Table 'book.userss' doesn't exist )
    }
}catch (PDOException $e){
   echo $e->getMessage();

}