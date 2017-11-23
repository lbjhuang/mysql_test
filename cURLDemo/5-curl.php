<?php
header('content-type:text/html;charset=utf-8');
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'http://phpfamily123.org/index.html');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$res=curl_exec($ch);
// if(false===$res){
//     echo "cURL Error ".curl_error($ch);
//     exit;
// }
if($errno=curl_errno($ch)){
//     echo curl_error($ch);exit;
       echo curl_strerror($errno);exit;
}
$info=curl_getinfo($ch);
print_r($info);
curl_close($ch);