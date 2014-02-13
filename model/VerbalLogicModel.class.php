<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 2012-4-21
 * Time: 下午1:37
 * Description: verbal阅读的logic部分
 */
class VerbalLogicModel {

    private $db;
    private $table = 'verbal_reading_logic';

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
     * 根据题目的难易程度获取题目
     */
    public function getRandomQuestionByType ($type) {
        $sql = "SELECT `qid`, `article`, `question`, `choices`, `qtype`, `answer`, `explain` FROM `". $this->table. "` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(`qid`) FROM `". $this->table. "` where type='". $type. "') - (SELECT MIN(`qid`) FROM `". $this->table. "` where type='". $type. "')) + (SELECT MIN(`qid`) FROM `". $this->table. "` where type='". $type. "')) AS `id`) AS t2 WHERE t1.qid >= t2.id and type='". $type. "' ORDER BY t1.qid LIMIT 1";
        $data = $this->db->getData($sql);

        return $data;
    }

    /**
     * @param $qid
     * 根据qid获取问题和答案信息
     */
    public function getQuestionById ($ucid, $qid) {
        $sql = "SELECT `article`, `question`, `choices`, `qtype`, `answer`, `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid
     * @return mixed
     * 根据qid获取问题
     */
    public function getVerbalLogicById ($qid) {
        $sql = "SELECT `article`, `question`, `choices`, `answer`, `explain`, `qtype` from `". $this->table. "` where `qid`='". $qid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @return int
     * 获取文字推理逻辑题的最大ID
     */
    public function getMaxVerbalLogicId () {
        $sql = "SELECT MAX(`qid`) as max_id FROM `". $this->table. "`";
        $data = $this->db->getData($sql);
        return intval($data[0]['max_id']);
    }

}
