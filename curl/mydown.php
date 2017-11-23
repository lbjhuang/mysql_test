<?php
header('content-type:text/html;charset=utf-8');
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/mytest/curl/gold.gif");  //post提交地址
//注意文件名前要加@,而且要使用绝对路径
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$data = curl_exec($ch);  //执行请求
file_put_contents('down/1.gif', $data);  //下载到指定的目录
curl_close($ch);


