<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/22
 * Time: 17:23
 */
abstract class test{
    function __construct(){
        echo '000';
    }
}

class test2 extends test {
    function __construct(){
        parent::__construct();
        echo "1234567";
    }
}

$a = new test2();  //0001234567