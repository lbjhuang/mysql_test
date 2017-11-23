<?php
header('content-type:text/html;charset=utf-8');
// $data=array(
//     'username'=>'king',
//     'password'=>'king',
//     'email'=>'382771946@qq.com'
// );
// $data=json_encode($data);
$data="username=king&password=king&email=382771946@qq.com";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,'http://localhost/PHPAdvance/cURL/doAction1.php');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
// curl_setopt($ch,CURLOPT_POSTFIELDS,array('userInfo'=>$data));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$res=curl_exec($ch);
curl_close($ch);
echo $res;