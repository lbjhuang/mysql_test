<?php
///**
// * Created by PhpStorm.
// * User: wuheyou
// * Date: 2016/11/22
// * Time: 11:29
// */
//// 允许上传的图片后缀
//
//if(!empty($_FILES['photo'])){
//var_dump($_FILES);die;}
//echo 48484646;
//$allowedExts = array("gif", "jpeg", "jpg", "png");
//$temp = explode(".", $_FILES["file"]["name"]);
//echo $_FILES["file"]["size"];
//var_dump(pathinfo($_FILES["file"]['name']));
//var_dump($_FILES["file"]);
//$extension = end($temp);     // 获取文件后缀名
//if ((($_FILES["file"]["type"] == "image/gif")
//      || ($_FILES["file"]["type"] == "image/jpeg")
//      || ($_FILES["file"]["type"] == "image/jpg")
//      || ($_FILES["file"]["type"] == "image/pjpeg")
//      || ($_FILES["file"]["type"] == "image/x-png")
//      || ($_FILES["file"]["type"] == "image/png"))
//   && ($_FILES["file"]["size"] < 204800*2048)   // 小于 200 kb
//   && in_array($extension, $allowedExts)) {
//   if ($_FILES["file"]["error"] > 0) {
//      echo "错误：: " . $_FILES["file"]["error"] . "<br>";
//   } else {
//      echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//      echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//      echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//      echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
//
//      // 判断当期目录下的 upload 目录是否存在该文件
//      // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
//      if (file_exists("upload/" . $_FILES["file"]["name"])) {
//         echo $_FILES["file"]["name"] . " 文件已经存在。 ";
//      } else {
//         // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
//         move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
//         echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
//      }
//   }
//} else {
//   echo "非法的文件格式";
//}


$filename = '1991.jpg';
$xmlstr = $GLOBALS['HTTP_RAW_POST_DATA'];
if(empty($xmlstr)) {
    $xmlstr = file_get_contents('php://input');
}
if(!$xmlstr){
    exit( '没有接收到数据流.' );
} //by www.jbxue.com
$jpg = $xmlstr;//得到post过来的二进制原始数据
$file = fopen("./".$filename,"w");//打开文件准备写入
fwrite($file,$jpg);//写入
fclose($file);//关闭