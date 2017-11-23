<?php
$pdo = new PDO('mysql:host=localhost;dbname=book','root','');

$sql = "insert into user (username, password, email) values (:username,:password,:email)";
try {

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);  //绑定占位符的值
    $stmt->bindParam(':password', $password);

    $email = '123456@qq.com';
    $stmt->bindValue(':email', $email);  //绑定一个列的值，下次插入数据如果不自定则默认是这个值
    $username = 'king6';  //制定占位符的值
    $password = '66666';
    $stmt->execute();  #第一次插入数据

    $username = 'king7';
    $password = '77777';   //第二次插入数据没有指定email字段的值，则会默认为第一次插入数据时候绑定的列的值bingValue(':email', $email)
    $stmt->execute();  #第二次插入数据
    echo "最后插入到数据表记录的id是".$pdo->lastInsertId();   //最后插入到数据表记录的id
    echo "影响的行数是：".$stmt->rowCount();
}catch (PDOException $e){
    echo $e->getMessage();
}