<?php
header('content-type:text/html;charset=utf-8');
$ch=curl_init();
$options=array(
    CURLOPT_URL=>'http://phpfamily.org',
    CURLOPT_RETURNTRANSFER=>1
);
curl_setopt_array($ch, $options);
$res=curl_exec($ch);
curl_close($ch);
echo $res;