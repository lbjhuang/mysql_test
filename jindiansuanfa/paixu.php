<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14 0014
 * Time: 14:14
 */
//$arr = [88, 12, 21, 19, 150, 1, 62, 58, 11, 500, 118,360];
for ($i = 0; $i < 1000; $i++) {
    $arr[] = rand(1, 10000);
}

#1 插入排序
function insertSort($arr)
{
    for ($i = 1; $i < count($arr); $i++) {
        $tmp = $arr[$i];
        $key = $i - 1;
        while ($key >= 0 && $arr[$key] > $tmp) {
            $arr[$key + 1] = $arr[$key];
            $key--;
        }
        if (($key + 1 != $i)) {
            $arr[$key + 1] = $tmp;
        }
    }
    return $arr;
}

#2冒泡排序
function bubbleSort($arr)
{
    for ($i = 1; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr) - $i; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}


function doSort($name, $type)
{
    global $arr;
    $insertion_start_time = microtime(true);
    $name($arr);
    $insertion_end_time = microtime(true);
    $insertion_need_time = $insertion_end_time - $insertion_start_time;
    print_r($type . "耗时:" . $insertion_need_time . "<br />");
}

doSort('insertSort', '插入排序');
doSort('bubbleSort', '冒泡排序');






