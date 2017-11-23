<?php
header('content-type:text/html;charset=utf-8');
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'https://github.com/');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);//跳过证书检查
curl_exec($ch);
curl_close($ch);