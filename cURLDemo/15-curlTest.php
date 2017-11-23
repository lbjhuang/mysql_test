<?php
header('content-type:text/html;charset=utf-8');
$username='king + a & b - _ g % !';
$ch=curl_init();
// $username=urlencode($username);
$username=curl_escape($ch, $username);
curl_setopt($ch,CURLOPT_URL,'http://localhost/PHPAdvance/cURL/doAction2.php?username='.$username);
curl_exec($ch);
curl_close($ch);