<?php
//设计模式：单例模式 工厂模式 观察者模式 MVC模式


/**
 * Class Person 单例模式的例子
 */
class Db{
    private static $obj = null;
    private function __construct(){

    }
    static function getObj(){
        if(is_null(self::$obj)){  //只有在$obj是空的时候才可以创建对象，保证了该类只能有一个对象
            self::$obj = new Db();
            return self::$obj;
        }
    }

    public function query($sql){
        echo $sql;
    }
}

$p = Db::getObj();
$p->query("select * from user");

