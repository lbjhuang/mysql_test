<?php
function foo(){
    static $a = 5;
    $a++;
    echo $a;
}
foo();  //6
foo();   //7
foo();  //8