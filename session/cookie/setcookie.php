<?php
#1先执行一下setcookie.php文件，设置两个cookie，一个是30s过期
#2执行一下setcookie2.php文件，可以看到打印出了两个cookie的值
#3关闭浏览器30秒内再打开setcookie2.php文件，该设置了过期时间的cookie还存在，还可以输出cookie的值，另一个则不存在了
setcookie('nickname','keaiai');
setcookie('username','huangwei',time()+30);  //30s 过期的cookie
setcookie('username','huangwei',time()+30, '/'); //添加根目录下都有效的cookie，默认的cookie的作用范围是当前目录，所以
//在外层目录的文件中打印cookie是没有效果的，那么我们可以设置cookie的作用范围为根目录，则根目录下所以文件只有打印cookie都可以输出来
