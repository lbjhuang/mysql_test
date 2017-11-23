<?php
$pdo = new PDO('mysql:host=localhost;dbname=book','root','');

try {
    #转账例子   包含了事务
    $sql1 = "update user_acount set money=money-155 where username='king2'";
    $sql2 = "update user_acount set money=money+155 where username='king'";
    var_dump($pdo->inTransaction());  //开启前检测是否开启了事务 输出false
    //开启事务
    $pdo->beginTransaction();
    var_dump($pdo->inTransaction());   //检测是否开启事务，输出true
    $res1 = $pdo->exec($sql1);
    if($res1==0){
        throw new PDOException('转账失败');
    }
    $res2 = $pdo->exec($sql2);
    if($res2==0){
        throw new PDOException('接收失败');
    }
    //提交事务
    $pdo->commit();
}catch (PDOException $e){
    $pdo->rollback();  //事务失败则回滚
    echo $e->getMessage();
}