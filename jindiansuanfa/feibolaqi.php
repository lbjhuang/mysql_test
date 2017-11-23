<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29 0029
 * Time: 13:42
 */

function feibolaqi($max){   //斐波那契数列
    $a = 0;
    $b = 1;
    for ($n=0; $n<$max; $n++){
        echo $b; //1
        $c = $a;  //0
        $a = $b; //1
        $b = $c + $b; //1
    }
}

feibolaqi(10);