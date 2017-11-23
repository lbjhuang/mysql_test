<?php
//初始化并设置
$ch = curl_init();
//设置相关选项
curl_setopt($ch, CURLOPT_URL,'www.baidu.com');  //设置获取地址
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  //返回结果不直接输出，以文件流的形式保存
//执行并获取结果
$res = curl_exec($ch);
//echo $res;  //这样就输出了
$info = curl_getinfo($ch);  //一个数组接受请求的信息，返回
print_r($info);
//释放资源
curl_close($ch);