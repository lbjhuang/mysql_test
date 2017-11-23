<?php
$pdo = new PDO('mysql:host=localhost;dbname=book','root','');
try{
    $sql = "SELECT * from user";
    $res = $pdo->query($sql);  //用query执行查询 返回PDOStatement对象
    foreach($res as $k=>$v){ //遍历这个对象
        echo "姓名：".$v['username'];
        echo "ID：".$v['id'];
        echo "<br>";
    }
}catch (PDOException $e){
    echo $e->getMessage();
}