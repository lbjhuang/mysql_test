<?php
//初始化并设置
$ch = curl_init();
//设置相关选项
//定义一个选项的数组
$options = array(
   'CURLOPT_URL'=>'http://i1.hoopchina.com.cn/u/1702/07/144/1144/c9915630gif.gif',
   'CURLOPT_RETURNTRANSFER'=>1
);
//调用该函数设置选项
curl_setopt_array($ch, $options);
//执行并获取结果
$res = curl_exec($ch);
//echo $res;  //这样就输出了
//if(false===$res){
//   echo 'curl 错误'.curl_error($ch);
//}
if($errorno = curl_errno($ch)){
   //echo curl_error($ch);exit;  //
   echo curl_strerror($errorno);exit;  //错误的字符串描述
}
$filename = 'D:/xampp/htdocs/mytest/curl/gold.gif';
file_put_contents($filename, $res);   //将远程的gif图下载到目录
$info = curl_getinfo($ch);
$size = filesize($filename);
//var_dump($info);die;
if($size!= $info['size_download']){
   echo '下载数据不完整';
}else{
   echo '下载数据完整';
}

//释放资源
curl_close($ch);