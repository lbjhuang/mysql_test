<?php
setcookie('username', '', time()-1);  //删除cookie

setcookie("user['username']",'huang', time()+30);  //数组的形式设置cookie
setcookie("user['password']",'ddyt123456', time()+30);