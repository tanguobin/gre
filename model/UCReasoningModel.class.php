<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-5-28
 * Time: 下午10:33
 * 保存个人的verbal和quantity数据
 */

class UCReasoningModel {

    private $db;
    private $table = 'uc_reasoning';

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
     * @param $qids
     * @param $answers
     * @return mixed
     */
    public function insertUCReasoning ($username, $qids, $startqid, $answers, $type) {
        $sql = "INSERT INTO `". $this->table. "` ( `username`, `qids`, `startqid`, `answers`, `type` ) VALUES ( '". $username. "', '". $qids. "', '". $startqid. "', '". $answers. "', '". $type. "' )";
        $this->db->runSql($sql);

        return $this->db->errno();
    }

    /**
     * 获得个人中心数据条数
     * @param $username
     * @param $type
     * @return mixed
     */
    public function getUCReasoningCount ($username, $type) {
        $sql = "SELECT count(`id`) as cnt FROM `". $this->table. "` WHERE `username` = '". $username. "' and `type` = '". $type. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * 获得指定条数的Reasoning记录
     * @param $username
     * @param $type
     * @param $count
     * @return mixed
     */
    public function getUCReasoning ($username, $type, $start, $count) {
        if ($type == 'verbal') {
            $btable = 'verbal_single_choice';
            $sql = "SELECT A.`id`, `dateline`, `question`, `answers`, `startqid` FROM `". $this->table. "` as A, `". $btable. "` as B WHERE A.`startqid` = B.`qid` and `username` = '". $username. "' and A.`type` = '". $type. "' limit ". $start. ", ". $count;
        } else {
            $btable = 'quantity_compare';
            $sql = "SELECT A.`id`, `dateline`, `question`, `A`, `B`, `answers`, `startqid` FROM `". $this->table. "` as A, `". $btable. "` as B WHERE A.`startqid` = B.`qid` and `username` = '". $username. "' and A.`type` = '". $type. "' limit ". $start. ", ". $count;
        }
        $data = $this->db->getData($sql);
        return $data;
    }

}
