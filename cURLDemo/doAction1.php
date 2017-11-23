<?php
header('content-type:text/html;charset=utf-8');
print_r($_POST);
// print_r(json_decode($_POST['userInfo']));
/*
http://www.maiziedu.com/user/login/ 登陆
csrfmiddlewaretoken=6p8uzvituIj0I3t2p5AuD4Xl4TeaUHdm&account_l=382771946%40qq.com&password_l=heshanheshan

http://q.maiziedu.com/comment/ 评论
parent_id=0&relate_id=24281&content=%3Cp%3Etest+test%3C%2Fp%3E&user_id=2529&type=1&get_or_set=set
 */