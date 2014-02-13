<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-4-13
 * Time: 下午9:22
 * User Model
 */
class UserModel {
    private $db;
    private $table = 'user_sns';

    static private $model;

    // 构造函数
    public function __construct () {
        // 初始化数据库连接
        $this->db = DB::getSaeMysql();
    }

    public static function getModel () {
        if (!isset(self::$model)) {
            self::$model = new self();
        }
        return self::$model;
    }


    /**
     * 获得用户的相关信息
     * @param $username
     * @return mixed
     */
    public function getUserInfo ($username) {
        $sql = "SELECT `uid`, `email`, `username`, `password` FROM `". $this->table. "` WHERE `username`='". $username. "'";
	    $data = $this->db->getData($sql);
	    return $data;
    }

    /**
     * 插入一条用户记录
     * @param $email
     * @param $username
     * @param $password
     * @return 返回插入后的错误信息
     */
    public function insertUser ($uid, $email, $username, $password) {
        $sql = "INSERT INTO `". $this->table. "` ( `uid`, `email`, `username`, `password` ) VALUES ( '". $uid. "', '". $email. "', '". $username. "', '". $password. "' )";
        $this->db->runSql($sql);

        return $this->db->errno();
    }

    /**
     * 判断表中是否存在指定用户名和密码的用户
     * @param $username
     * @param $password
     * @return mixed
     */
    public function getLoginInfo ($username, $password) {
        $sql = "SELECT `uid`, `email`, `username` FROM `". $this->table. "` WHERE (`username` = '". $username. "' or `email` = '". $username. "') and `password` = '". $password. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    public function getLoginInfoByUid ($uid) {
        $sql = "SELECT `uid`, `email`, `username` FROM `". $this->table. "` WHERE `uid` = '". $uid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }
}
