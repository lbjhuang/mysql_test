<?php
	/*向客户端发送一个cookie，将变量name值为huangdada，保存10s
	setcookie('name',' huangdada',time()+10);   
	echo $_COOKIE["name"];
	*/

	session_start();
	$_SESSION['name']='huangdada';
	$_SESSION['id']='12345689';
	echo $_SESSION['name'].'<br>';  //输出全局数组$_SESSION里面的值
	echo session_id().'<br>';
	echo session_name().'<br>';       //输出session 的名字
	//echo session_regenerate_id(); 
		// 刷新一次增加一个新的session id 使用替换原来的，但不删除原来的sessionid	
	//session_unset(); 
		//释放当前在内存中已经创建的所有$_SESSION变量，但不删除session文件以及不释放对应的session id
	//unset($_SESSION['name']);   //仅仅删除一个变量和值
	//session_destroy();   
	//删除当前用户对应的tmp/session文件以及释放sessionid，内存中的$_SESSION变量内容依然保留
	?>	