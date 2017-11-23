<?php
/**
 * Created by PhpStorm.
 * User: wuheyou
 * Date: 2016/11/23
 * Time: 11:23
 */
/*
1先找到配置文件php.ini中以下几项扩展
extension=php_pdo_firebird.dll
extension=php_pdo_mssql.dll
extension=php_pdo_mysql.dll
extension=php_pdo_oci.dll
extension=php_pdo_oci8.dll
extension=php_pdo_odbc.dll
extension=php_pdo_pgsql.dll
extension=php_pdo_sqlite.dll
 
2.使用PDO连接数据库(注意执行结束时注消当然不注消也不会出现错误):
$dbh = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pwd);
 
$dbh = null; //(unset)
 
3.一些简单的执行(关键字:exec)
<?php
$dbname="myzjh";
$user="root";
$pwd="123456";
$dbh = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pwd);
$result = $dbh->exec("INSERT INTO test SET name = 'seal',age='20'");
$result=$dbh->exec("delete from test where name='seal'");
$dbh = null;
?>
执行失败则返回0;
 
 
 
 
 
4.查询输出数据常用方法一:
 
$rs = $dbh->query("select * from test");
while($row = $rs->fetch()){
echo $row[name].$row[age];
}
 
5.查询数据方法二:
foreach ($dbh->query('SELECT * from test') as $row) {
      echo $row[name].$row[age];
   }
6.查询数据方法三:
$stmt = $dbh->prepare("select * from test");
if ($stmt->execute()) {
while ($row = $stmt->fetch()) {
    print_r($row);
}
}
 
6.1 PDO::prepare 别类查询方式(execute功能很强大):
$stmt = $dbh->prepare("select * from test where name = ?");
if ($stmt->execute(array("zjh"))) {   //zjh为查询的条件
while ($row = $stmt->fetch()) {
    print_r($row);
}
}
 
7.执行的别种方式(也是用execute)
$stmt = $dbh->prepare("insert into test (name, age) values (?, ?)"); //and updata
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $age);
$name = 'one';    // insert one row
$age = 1;
$stmt->execute();
$name = 'two'; // insert another row with different values
$age = 2;
$stmt->execute();
 
关键字总结
查询操作主要是
PDO::query(): 主要是用于有记录结果返回的操作，特别是SELECT操作
PDO::exec(): 主要是针对没有结果集合返回的操作，比如INSERT、UPDATE、DELETE等操作，它返回的结果是当前操作影响的列数
PDO::prepare(): 主要是预处理操作，需要通过$rs->execute()来执行预处理里面的SQL语句，这个方法可以绑定参数，功能比较强大
 
获取结果集操作主要是：
PDOStatement::fetchColumn(): 是获取结果指定第一条记录的某个字段，缺省是第一个字段
PDOStatement::fetch():是用来获取一条记录
PDOStatement::fetchALL():是获取所有记录集到一个中，获取结果可以通过PDOStatement::setFetchMode来设置需要结果集合的类型。
 
另外有两个周边的操作，
PDO::lastInsertId():是返回上次插入操作，主键列类型是自增的最后的自增ID。
PDOStatement::rowCount() :主要是用于PDO::query()和PDO::prepare()进行DELETE、INSERT、UPDATE操作影响的结果集，对PDO::exec()方法和SELECT操作无效。
 */


$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='linshang_shop';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

$db = new PDO($dsn, $user, $pass); //初始化一个PDO对象
$db->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
$rs = $db->query("select * from shop_base");
$rs->setFetchMode(PDO::FETCH_ASSOC);   //设置获取模式为只获取关联数组的模式
//$result = $rs->fetchColumn(4);   //是获取结果指定第一条记录的某个字段，缺省是第一个字段
//$result = $rs->fetch();   //获取一条记录
$result = $rs->fetchAll();    //获取全部记录 
$result = json_encode($result);
echo $result;
$db = null;


?>