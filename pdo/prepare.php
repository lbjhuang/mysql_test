<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/24
 * Time: 10:03
 */
//连接数据库
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='linshang_shop';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
#########例1##########
$id = 150;
$db = new PDO($dsn, $user, $pass); //初始化一个PDO对象
//$sth = $db->prepare('select area as xiaoqu from shop_base where id< :id');
//$sth->bindParam(':id',$id);   //绑定占位符的变量
//$sth->setFetchMode(PDO::FETCH_ASSOC);   //设置只返回结果集的关联数组部分
//$result =$sth->fetchAll();   //获取结果集全部记录
//   var_dump($result);
#########例2插入数据方式1##########
$sth = $db->prepare('insert into shop_base (uid,name,address) VALUES (:uid,:name,:address)');
$sth->execute(array(':uid'=>'28777899','name'=>'huangweiaaa','address'=>'建国路'));   //执行预处理语句
#########例3插入数据的方式2##########
//如果改成问号为占位符则直接上一个数组，指定对应位置的值即可，不用像上面那样需要指定:uid等key及其对应的值，当然，分别绑定三个变量也可以如例1一样
//$sth = $db->prepare('insert into shop_base (uid,name,address) VALUES (?,?,?)');
//$sth->execute(array('866899','huangweia','建国路'));   //执行预处理语句
//$row = $sth->rowCount();  //返回受影响的行数
//echo $row;

########模糊查询#######
//$sth = $db->prepare('select * from shop_base where name like ?');
//$sth->execute(array("%pa%"));        //模糊查询
//$sth->setFetchMode(PDO::FETCH_ASSOC);   //设置只返回结果集的关联数组部分
//$row = $sth->fetch();
//var_dump($row);




























