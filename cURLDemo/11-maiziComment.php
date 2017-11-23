<?php
header('content-type:text/html;charset=utf-8');
$header=array(
    'Host: www.maiziedu.com',
    'Origin: http://q.maiziedu.com',
    'Referer: http://q.maiziedu.com/ask/',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2687.0 Safari/537.36'
);
$data="account_l=382771946%40qq.com&password_l=heshanheshan";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www.maiziedu.com/user/login/');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_COOKIESESSION,true);//使用cookie
$cookieFile=dirname(__FILE__).'/maiziCookie.txt';
curl_setopt($ch,CURLOPT_COOKIEFILE,$cookieFile);
curl_setopt($ch,CURLOPT_COOKIEJAR,$cookieFile);
curl_setopt($ch,CURLOPT_COOKIE,session_name().'='.session_id());
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
$res1=curl_exec($ch);
// echo $res1;
//http://q.maiziedu.com/article/23984/
//parent_id=0&relate_id=24281&content=%3Cp%3Etest+test%3C%2Fp%3E&user_id=2529&type=1&get_or_set=set
$header=array(
    'Host: q.maiziedu.com',
    'Origin: http://q.maiziedu.com',
    'Referer: http://q.maiziedu.com/article/23984/',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2687.0 Safari/537.36'
);
$data="parent_id=0&relate_id=23984&content=%3Cp%3Eh111ello+w222orld%3C%2Fp%3E&user_id=2529&type=1&get_or_set=set";
curl_setopt($ch,CURLOPT_URL,'http://q.maiziedu.com/comment/');
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
$res2=curl_exec($ch);
curl_close($ch);
echo $res2;



