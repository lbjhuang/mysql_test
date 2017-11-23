<?php
header('content-type:text/html;charset=utf-8');
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/PHPAdvance/cURL/doUpload.php");
//注意文件名前要加@,而且要使用绝对路径
$data=array('file'=>'@G:\4.jpg');
curl_setopt($ch,CURLOPT_POST,1);//设置post方式发送数据
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);//发送数据，数据形式两种，但是文件上传需要发送数组形式的数据
curl_exec($ch);
curl_close($ch);
