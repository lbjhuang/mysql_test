<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29 0029
 * Time: 13:42
 */
//先定义一个数组
$arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 13, 14, 15, 16, 17, 18];

/**顺序查找
 * @param $arr   数组
 * @param $target 要查找的数字
 */
function orderFind($arr, $target){
    foreach ($arr as $k=>$v){
        if($v == $target){
            echo $k;
            exit(0);
        }
    }
    echo "顺序查找未找到".$target;
}


/*
 * 二分法查找
 */
function findMiddle($arr, $low, $high, $k)
{
    if ($low <= $high) {
        $mid = ($low + $high) / 2; //中间值
        if ($k == $arr[$arr[$mid]]) {
            echo $k;
        } elseif ($k < $arr[$mid]) {
            findMiddle($arr, $low, $mid - 1, $k);
        } else {
            findMiddle($arr, $mid + 1, $high, $k);
        }
    } else {
        echo  "没有找到要查找的值：".$k;
    }
}

findMiddle($arr, 0, 15, 8);
orderFind($arr, $target = 35);