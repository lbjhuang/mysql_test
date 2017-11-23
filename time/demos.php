<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8 0008
 * Time: 9:45
*/
echo date('Y-m-d h:i:s',time()) ."<br>";

//运行结果(年月日时分秒，“-”间隔)：2014-09-12 06:28:32

echo date('Y-m-d',time())."<br>";

//运行结果(年月日，“-”间隔)：2014-09-12

echo date('Y-m-d',strtotime(date('Y-m-d', time()-86400)))."<br>";

//运行结果(当前日期前一天的年月日，“-”间隔)：2014-09-11

echo date('Ymd',time())."<br>";

//运行结果(年月日，无间隔)：20140912

echo date('m-d',time())."<br>";

//运行结果(月日，“-”间隔)：09-12

echo str_replace("-","月",date('m-d',time()-date('w',time())*86400))."日<br>";

//运行结果(月日，汉字显示间隔)：09月12日

echo date('w',time())."<br>";

//运行结果(星期几)：5

echo time()."<br>";

//运行结果(当前日期时间的秒数)：1410503809

echo strtotime(date('Y-m-d',time()))."<br>";

//运行结果(当前日期秒数，具体到天)：1410503809

echo date('Y-m-d',strtotime(date('Y-m-d', time()))-date('w',strtotime(date('Y-m-d', time())))*86400)."<br>";

//运行结果(当前日期所属自然周的起始日期即周日的日期，具体到天，“-”间隔)：2014-09-0



//php获取今日开始时间戳和结束时间戳
$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
echo $beginToday."<br>";
echo $endToday."<br>";;

//php获取昨日起始时间戳和结束时间戳
$beginYesterday=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
$endYesterday=mktime(0,0,0,date('m'),date('d'),date('Y'))-1;
echo $beginYesterday."<br>";
echo $endYesterday."<br>";

//php获取上周起始时间戳和结束时间戳
$beginLastweek=mktime(0,0,0,date('m'),date('d')-date('w')+1-7,date('Y'));
$endLastweek=mktime(23,59,59,date('m'),date('d')-date('w')+7-7,date('Y'));

//php获取本月起始时间戳和结束时间戳
$beginThismonth=mktime(0,0,0,date('m'),1,date('Y'));
$endThismonth=mktime(23,59,59,date('m'),date('t'),date('Y'));

//日子条件筛选
$start = "2017-08-08";
$end = "2017-08-18";
$map[] = ['art_time', '>=', strtotime($start)];   #开始日子
$map[] = ['art_time', '<', strtotime('+1 day', strtotime($end))];  //结束日子的第二天前

