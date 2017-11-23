<?php
//设置编码为UTF-8，以避免中文乱码

ini_set("display_errors", 'On');
ini_set('error_reporting', E_ALL);

$host = 'https://m.szxkbl.com/v1/order/cancel';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_POST, true);

$params= '{"data":"不想要了，任性。","model":"m1 metal","rt":1482890913107,"sid":"origf0hv9ifi031ifk7bkgnk62","subordersn":"1482890864297520","sv":"5.1","system":"android","uuid":"c717d4ffcb1a0727","ver":"1.0","vertype":6}';

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 检查证书中是否设置域名
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

$filecontent = curl_exec($ch);
var_export($filecontent);
//var_export(curl_getinfo($ch));

if ($filecontent === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    //var_export(json_decode($filecontent, true));
}
curl_close($ch);
?>
