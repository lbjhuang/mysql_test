<?php
echo 1;
echo ob_get_contents();  //php.ini开启了otput_buffer=on可以把缓冲区的1 给输出来