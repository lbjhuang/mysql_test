<?php
//初始化并设置
//$ch = curl_init();
////设置相关选项
//curl_setopt($ch, CURLOPT_URL,'www.baidu.com');  //设置获取地址
$url = 'www.baidu.com';
$ch = curl_init($url);
//执行并获取结果
curl_exec($ch);
//释放资源
curl_close($ch);