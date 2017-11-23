<?php
header('content-type:text/html;charset=utf-8');
class PdoMysql
{
    public static $config = array(); // 设置连接参数，配置信息
    public static $link = null; //保存连接标识符
    public static $pconnect = false; //是否开启了长连接
    public static $dbVersion; //数据库版本
    public static $connected = false;//是否连接成功
    public static $PDOStatement = null;//保存PDOStatement对象
    public static $queryStr = null;//保存最后执行的操作
    public static $error = null;//报错错误信息
    public static $lastInsertId = null;//保存上一步插入操作产生AUTO_INCREMENT
    public static $numRows = 0;//上一步操作产生受影响的记录的条数

    /** 构造函数
     * @param string $dbConfig
     */
    public function __construct($dbConfig = '')
    {
        if (!class_exists("PDO")) {
            self::throw_exception('不支持pdo，请先检测是否开启');
        }
        if (!is_array($dbConfig)) {
            $dbConfig = array(   //数据库配置初始化
                'hostname' => DB_HOST,
                'username' => DB_USER,
                'password' => DB_PWD,
                'database' => DB_NAME,
                'hostport' => DB_PORT,
                'dbms' => DB_TYPE,
                'dsn' => DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME
            );
        }
        if (empty($dbConfig['hostname'])) self::throw_exception('没有定义数据库配置，请先定义');
        self::$config = $dbConfig;
        if (empty(self::$config['params'])) self::$config['params'] = array();
        if (!isset(self::$link)) {
            $configs = self::$config;
            if (self::$pconnect) {
                //开启长连接，添加到配置数组中
                $configs['params'][constant("PDO::ATTR_PERSISTENT")] = true;
            }
            try {
                self::$link = new PDO($configs['dsn'], $configs['username'], $configs['password'], $configs['params']);
            } catch (PDOException $e) {
                self::throw_exception($e->getMessage());
            }
            if (!self::$link) {
                self::throw_exception('PDO连接错误');
                return false;
            }
            self::$link->exec('SET NAMES ' . DB_CHARSET);  //连接成功设置字符集
            self::$dbVersion = self::$link->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));  //获取连接版本信息
            self::$connected = true;  //把连接状态设置为true
            unset($configs);
        }
    }

    /*
     * 自定义错误处理函数
     */
    public function throw_exception($msg)
    {
        echo '<div style="width:80%;background-color:#ABCDEF;color:black;font-size:20px;padding:20px 0px;">' . $msg . '</div>';
    }

    /**
     * 释放结果集
     */
    public static function free()
    {
        self::$PDOStatement = null;
    }

    public static function haveErrorThrowException()
    {
        $obj = empty(self::$PDOStatement) ? self::$link : self::$PDOStatement;
        $arrError = $obj->errorInfo();  //错误信息，返回一个数组
        //print_r($arrError);
        if ($arrError[0] != '00000') {
            self::$error = 'SQLSTATE: ' . $arrError[0] . ' <br/>SQL Error: ' . $arrError[2] . '<br/>Error SQL:' . self::$queryStr;
            self::throw_exception(self::$error);
            return false;
        }
        if (self::$queryStr == '') {
            self::throw_exception('没有执行SQL语句');
            return false;
        }
    }

    /**
     * 关闭连接，销毁连接对象，关闭数据库
     */
    public static function close()
    {
        self::$link = null;
    }

    public static function query($sql = '')
    {
        $link = self::$link;
        if (!$link) return false;
        //判断之前是否有结果集,有则释放结果集
        if (!empty(self::$PDOStatement)) self::free();
        self::$queryStr = $sql;
        //预处理语句，返回一个statement对象
        self::$PDOStatement = $link->prepare(self::$queryStr);
        $res = self::$PDOStatement->execute();
        self::haveErrorThrowException();
        return $res;
    }

    /** 获取所有记录
     * @param null $sql
     * @return mixed
     */
    public static function getAll($sql = null)
    {
        if ($sql != null) {
            self::query($sql);
        }
        $result = self::$PDOStatement->fetchAll(constant("PDO::FETCH_ASSOC"));
        return $result;
    }

    /** 获取一条记录
     * @param null $sql
     * @return mixed
     */
    public static function getRow($sql = null)
    {
        if ($sql != null) {
            self::query($sql);
        }
        $result = self::$PDOStatement->fetch(constant("PDO::FETCH_ASSOC"));
        return $result;
    }

    /**增删改执行函数
     * @param null $sql
     * @return bool|int
     */
    public static function execute($sql = null)
    {
        #1.连接标识符
        $link = self::$link;
        if (!$link) return false;
        self::$queryStr = $sql;
        #2.判断之前是否有结果集,有则释放结果集
        if (!empty(self::$PDOStatement)) self::free();
        #3.执行增删改语句
        $result = $link->exec(self::$queryStr);
        #4.错误处理
        self::haveErrorThrowException();
        if (!$result) {
            self::$lastInsertId = $link->lastInsertId();
            self::$numRows = $result;
            return self::$numRows;
        } else {
            return false;
        }
    }


    public static function findById($tableName, $priId, $fields = "*")
    {
        $sql = "select %s from %s where id = %s";
        return self::getRow(sprintf($sql, self::parseFields($fields), $tableName, $priId));
    }

    /** 解析字段
     * @param $fields
     * @return string
     */
    public static function parseFields($fields)
    {
        if(is_array($fields)){
            //对数组中的每个元素应用用户自定义函数，传递数组是用pdoMysql对象里面的addSpecialChar方法
            array_walk($fields, array('PdoMySQL','addSpecialChar'));
            $fieldStr = implode(',', $fields);
        }elseif(is_string($fields) && !empty($fields)){
            if(strpos($fields, '`') === false){
                $fields = explode(',' , $fields);
                array_walk($fields, array('PdoMySQL','addSpecialChar'));
                $fieldStr = implode(',', $fields);
            }else{
                $fieldStr = $fields;
            }
        }else{
            $fieldStr = '*';
        }
        return $fieldStr;
    }

    /** 通过反引号引用字段
     * @param $value
     * @return string
     */
    public static function addSpecialChar(&$value){
        if($value==='*'||strpos($value,'.')!==false||strpos($value,'`')!==false){
            //不用做处理
        }elseif(strpos($value,'`')===false){
            $value='`'.trim($value).'`';
        }
        return $value;
    }


    /** 执行普通查询
     * @param $tables
     * @param null $where
     * @param string $fields
     * @param null $group
     * @param null $having
     * @param null $order
     * @param null $limit
     * @return mixed
     */
    public static function find($tables,$where=null,$fields='*',$group=null,$having=null,$order=null,$limit=null){
        $sql = "SELECT ".self::parseFields($fields)." FROM ".$tables
            .self::parseWhere($where)
            .self::parseGroup($group)
            .self::parseHaving($having)
            .self::parseOrder($order)
            .self::parseLimit($limit);
        $dataAll = self::getAll($sql);
        return count($dataAll)==1?$dataAll[0]:$dataAll;

    }

    /** 解析where条件
     * @param $where
     * @return string
     */
    public static function parseWhere($where){
        $whereStr = '';
        if(is_string($where) && !empty($where)){
            $whereStr = $where;
        }
        return empty($whereStr)?'':' WHERE '.$whereStr;
    }

    /**
     * 解析group by
     * @param unknown $group
     * @return string
     */
    public static function parseGroup($group){
        $groupStr='';
        if(is_array($group)){
            $groupStr.=' GROUP BY '.implode(',',$group);
        }elseif(is_string($group)&&!empty($group)){
            $groupStr.=' GROUP BY '.$group;
        }
        return empty($groupStr)?'':$groupStr;
    }
    /**
     * 对分组结果通过Having子句进行二次删选
     * @param unknown $having
     * @return string
     */
    public static function parseHaving($having){
        $havingStr='';
        if(is_string($having)&&!empty($having)){
            $havingStr.=' HAVING '.$having;
        }
        return $havingStr;
    }

    /**
     * 解析Order by
     * @param unknown $order
     * @return string
     */
    public static function parseOrder($order){
        $orderStr='';
        if(is_array($order)){
            $orderStr.=' ORDER BY '.join(',',$order);
        }elseif(is_string($order)&&!empty($order)){
            $orderStr.=' ORDER BY '.$order;
        }
        return $orderStr;
    }


    /**
     * 解析限制显示条数limit
     * limit 3
     * limit 0,3
     * @param unknown $limit
     * @return unknown
     */
    public static function parseLimit($limit){
        $limitStr='';
        if(is_array($limit)){
            if(count($limit)>1){
                $limitStr.=' LIMIT '.$limit[0].','.$limit[1];
            }else{
                $limitStr.=' LIMIT '.$limit[0];
            }
        }elseif(is_string($limit)&&!empty($limit)){
            $limitStr.=' LIMIT '.$limit;
        }
        return $limitStr;
    }
}
require_once('config.php');
$pdoMysql = new PdoMysql();
////$sql = "update user set username='心情好' where id=5";
//////$sql = "delete from user where id = 6";
////$res = $pdoMysql->execute($sql);
////print_r($res);
//$res = $pdoMysql->findById('user', 2, 'username, password');
//print_r($res);
$tables='user';
//print_r($pdoMysql->find($tables));
//print_r($pdoMysql->find($tables,'id>=3'));
