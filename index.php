<?php
//设置编码为UTF-8，以避免中文乱码



ini_set("display_errors", 'On');
ini_set('error_reporting', E_ALL);

header('Content-Type:text/html;charset=utf-8');

//m.szxkbl.com 线上
$host = 'http://m.szxkbl.com/v1/order/list';//$host = 'http://m.linshang.com/?m=shop&r=imgadd&debug_model=wuheyou';
//$host = 'http://m.linshang.com/?m=shop&r=imgtest&debug_model=wuheyou&dev=zxy';
//$host = 'http://m.linshang.com/?m=shop&r=apply';
//$host = 'http://m.linshang.com/?m=goods&r=edit&debug_model=wuheyou&dev=zxy';
//$host = 'http://m.linshang.com/?m=shop&r=edit&debug_model=wuheyou&dev=zxy';
//$host = 'http://localhost/MutiUpload/upload.php';
//$host = 'http://o.wuheyou.com/user/login';

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $host);
curl_setopt($ch, CURLOPT_POST, true);
// same as <input type="file" name="file_box">

//$data1 = '{"mobile":"15816860185","model":"HUAWEI GRA-CL10","password":"e10adc3949ba59abbe56e057f20f883e","rt":1474868920524,"sv":"6.0","system":2,"type":1,"uuid":"161496742646c249","ver":"1.2.12","vertype":6}';

//$files[] = new CURLFile('/data/wwwroot/resources/upload/2015010926050.jpg','image/jpeg','2015010926050');
//$files[] = new CURLFile('/data/wwwroot/resources/upload/2015010973765.jpg','image/jpeg','2015010973765');
$data = array(
   'sid' => 'ppfceih27390ghpm9vio0m6k92',
    'p' => '1',
    'tag' => '5',
    'shopid' =>'4'
);
//$data = array(
//    'sid' => 'fk34iqj99mke9gml00oalkbqp0',
//    'shopname' => "掌上明珠",
//    'address' => "A街B楼C室",
//);

//$params['photo'] = new CURLFile('C:/Cetics.jpg','image/jpeg','Cetics.jpg');
//$params['card_img1'] = new CURLFile('C:/Users/Public/Pictures/Sample Pictures/3.jpg','image/jpeg','3.jpg');
//$params['card_img2'] = new CURLFile('C:/Users/Public/Pictures/Sample Pictures/1.jpg','image/jpeg','1.jpg');

//$params['img'] = new CURLFile('/data/wwwroot/resources/upload/2015010973765.jpg','image/jpeg','2015010973765');
//$params['data'] = json_encode($data);
$params = json_encode($data);

curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

echo $filecontent = curl_exec($ch);

//var_export(curl_getinfo($ch));

if ($filecontent === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
//    /var_export(json_decode($filecontent, true));
}
curl_close($ch);

//$params = array(
//    'sid' => '6soeh19dufk6ldod7vlqu7s7c3',
//    'mobile' => '13267228320',
//    'code' => 871395,
//    'shopname' => "掌上明珠",
//    'shopowner' => "zhang3",
//    'area' => "ABC",
//    'location' => "{'lat':000.00, 'lng':000.00}",
//    'address' => "A街B楼C室",
//    'cardid' => "431229198608110859"
//);
//
//$params = json_encode($params);
?>

<?php
//设置编码为UTF-8，以避免中文乱码
header('Content-Type:text/html;charset=utf-8');
?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--    <title>文件上传表单页面</title>-->
<!--</head>-->
<!--<body>-->
<!--<form action="http://localhost/MutiUpload/upload.php" method="post" enctype="multipart/form-data">-->
<!--    <input type="hidden" name="_json" value="--><?php //echo $params ?><!--" >-->
<!--    文件1：<input name="card_imgs[]" type="file" /><br/>-->
<!--    文件2：<input name="card_imgs[]" type="file" /><br/>-->
<!--    <input type="submit" value="上传" />-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
