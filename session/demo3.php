<?php
session_start();
$users = [
    'user1'=>['name'=>'sam', 'salary'=>1000],
    'user2'=>['name'=>'paul', 'salary'=>2000],
    'user3'=>['name'=>'kevin', 'salary'=>3000]
];
$_SESSION = $users; //数组的形式保存session
