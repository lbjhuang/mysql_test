<?php
$pdo = new PDO('mysql:host=localhost;dbname=book','root','');

$sql = "select username, email from user";
try {
    $stmt = $pdo->query($sql);
    $row1 = $stmt->fetchColumn(0);
    $row2 = $stmt->fetchColumn(0);
    //$stmt->nextRowset();
    $row3 = $stmt->fetchColumn(0);
    var_dump($row3);
}catch (PDOException $e){
    echo $e->getMessage();
}