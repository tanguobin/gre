<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-9
 * Time: 下午4:49
 * 数据库
 */
class DB {
    static private $saemysql;

    public function __construct () {}

    /**
     * 单例构造函数
     * @return saemysql
     */
    public static function getSaeMysql () {
        if (!isset(self::$saemysql)) {
	        self::$saemysql = new SaeMysql();
	        self::$saemysql->setCharset('UTF8');
        }
        return self::$saemysql;
    }

    // 手动调用关闭数据库
    public function closeDb () {
	    self::$saemysql->closeDb();
    }

    // 应用析构函数自动释放连接资源
    public function __destruct() {
	    self::closeDb();
    }
}