<?php
session_start();  //开启会话
var_dump($_SESSION); //打印demo1中设置好的session数组 关闭浏览器后访问该文件则SSESSION数组为空了