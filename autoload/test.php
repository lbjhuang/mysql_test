<?php
//require "Test1.php";
//require "Test2.php";

#自动加载类的一个函数，只要new 一个类，她会自动执行这个函数去引入指定的类
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});
$p = new Test2();
$p->path();
