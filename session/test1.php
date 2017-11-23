<?php
session_start();
$_SESSION['username'] = 'paul';
echo "Session ID：".session_id()."<br>"; //在当前页输出session
?>
<!--url中附加session信息-->
<a href="test2.php?<?php echo SID?>">通过URL传递session ID</a>