<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2017/2/15
 * Time: 14:52
 */
header('content-type:text/html;charset=utf-8');
//检查curl是否开启
var_dump(extension_loaded('curl'));   //true
//curl版本信息
print_r(curl_version());