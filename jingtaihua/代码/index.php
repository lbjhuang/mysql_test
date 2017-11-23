<?php
/**
 * 处理cms首页静态化业务逻辑
 * 有3种方案， 第一：定时(利用crontab来处理)  第二：人为触发 第三：在页面中控制时间来操作
*/
//header("content-type:text/htm;charset=utf-8");

//根据生成的静态页的时间，每1200s触发系统生成新的静态页面，如果没过期则不生成新的
if(is_file('./index.html') && (time()-filemtime('./index.html') < 1200)) {
	require_once('./index.html');
}else {
	// 引入数据库链接操作
	require_once('./db.php');
	$sql = "select * from news where `category_id` = 1 and `status` = 1 limit 4";
	try{
		$db = Db::getInstance()->connect();
		$result = mysql_query($sql, $db);
		$newsList = array();
		while($row = mysql_fetch_assoc($result)) {
			$newsList[] = $row;
		}
	}catch(Exception $e) {
		// TODO
	}
	ob_start();  //开启buffer缓冲区
	require_once('template/index.php');  //引入视图模板，在模板中把数据遍历出来
	$s = ob_get_contents();  //获取缓冲区的index.php页面的内容
	file_put_contents('./index.html', $s);   //把内容写入到静态页
	//ob_clean();
}
