<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-5-28
 * Time: 下午10:33
 * 保存个人的分析性写作数据
 */

class UCWritingModel {

    private $db;
    private $table = 'uc_writing';

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
     * 插入一条数据
     * @param $username
     * @param $aid
     * @param $article
     * @return mixed
     */
    public function insertUCWriting ($username, $sid, $article, $type) {
        $sql = "INSERT INTO `". $this->table. "` ( `username`, `sid`, `article`, `type` ) VALUES ( '". $username. "', '". $sid. "', '". $article. "', '". $type. "' )";
        $this->db->runSql($sql);

        return $this->db->errno();
    }

    /**
     * 获得指定条数的writing记录
     * @param $username
     * @param $type
     * @param $count
     * @return mixed
     */
    public function getUCWriting ($username, $type, $start, $count) {
        $sql = "SELECT A.`id`, `dateline`, `article`, `title` FROM `". $this->table. "` as A, `". $type. "` as B WHERE A.`sid` = B.`id` and `username` = '". $username. "' and `type` = '". $type. "' limit ". $start. ", ". $count;
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * 得到条数
     * @param $username
     * @param $type
     * @return mixed
     */
    public function getUCWritingCount ($username, $type) {
        $sql = "SELECT count(`id`) as cnt FROM `". $this->table. "` WHERE `username` = '". $username. "' and `type` = '". $type. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * 根据ID获得用户文章
     * @param $username
     * @param $type
     * @param $id
     * @return mixed
     */
    public function getUCWritingById ($username, $type, $id) {
        $sql = "select A.`id`, `title`, `question`, `article` from `". $type. "` as A, `". $this->table. "` as B where A.id = B.sid and `username`='". $username. "' and B.id = '". $id. "'";
        $data = $this->db->getData($sql);
        return $data;
    }
}
