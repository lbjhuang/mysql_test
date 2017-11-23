<?php

ob_start();  //在内存开启一段缓冲区，则下面的输入会保存在缓冲区
echo 123;
//file_put_contents('index.shtml',ob_get_contents());  //写入缓冲区的123到文件index.shtml中 它写入之后会在浏览器输出缓冲区的内容123
//ob_clean(); //清空缓冲区，后则不会再浏览器中输出缓冲区的内容

file_put_contents('index.shtml',ob_get_clean());
//写入缓冲区的123到文件index.shtml中 它写入之后立马清空缓冲区，不会在浏览器输出缓冲区的内容123
//相当于5，6两行代码的合集的效果