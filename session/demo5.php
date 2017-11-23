<?php
session_start();
$_SESSION['west'] = 'xizang';
$_SESSION['east'] = 'zhejiang';
//SID代表session_name=session_id
//如果
?>
<a href="demo6.php?<?php echo session_name();?>=<?php echo session_id();?>">dump_session</a>
<br>
<a href="demo6.php?<?php echo SID?>">SID形式</a>