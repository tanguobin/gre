<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-4-24
 * Time: 下午9:00
 * verbal部分的多项题
 */
class VerbalMultipleModel {

    private $db;
    private $table = 'verbal_multiple_choice';

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
     * @param type 题目的难易程度
     * @return Array
     * 根据题目的难易程度获取问题
     */
    public function getRandomQuestionsByType ($type, $num) {
        $sql = "SELECT `qid` from `". $this->table. "` where type='". $type. "' order by qid desc limit ". $num;
        $data = $this->db->getData($sql);
        $qid = intval($data[count($data) - 1]['qid']);
        $sql = "SELECT `qid`, `question`, `choices`, `answer`, `explain` FROM `". $this->table. "` AS t1 JOIN (SELECT ROUND(RAND() * (". $qid. "-(SELECT MIN(`qid`) FROM `". $this->table. "` where `type`='". $type. "'))+(SELECT MIN(`qid`) FROM `". $this->table. "` where `type`='". $type. "')) AS `id`) AS t2 WHERE t1.qid >= t2.id and `type`='". $type. "' ORDER BY t1.qid LIMIT ". $num;
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid
     * 根据qid获取问题和答案信息
     */
    public function getQuestionById ($ucid, $qid) {
        $sql = "SELECT `question`, `choices`, `answer`, `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid  根据qid获取问题
     * @return  Array
     * 根据qid获取问题
     */
    public function getVerbalMutipleById ($qid) {
        $sql = "SELECT `question`, `choices`, `answer`, `explain` from `". $this->table. "` where `qid`='". $qid. "'";
        $data = $this->db->getData($sql);

        return $data;
    }

    public function getMaxVerbalMultipleId () {
        $sql = "SELECT MAX(`qid`) as max_id FROM `". $this->table. "`";
        $data = $this->db->getData($sql);

        return intval($data[0]['max_id']);
    }

}
