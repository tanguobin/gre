<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-4-25
 * Time: 下午9:25
 * verbal阅读两题
 */
class VerbalTwiceModel {

    private $db;
    private $table = 'verbal_reading_twice';

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
    public function getRandomVerbalByType ($type) {
        $sql = "SELECT `qid`, `article`, `question1`, `choices1`, `q1type`, `answer1`, `explain1`, `question2`, `choices2`, `q2type`, `answer2`, `explain2` FROM `". $this->table. "` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(`qid`) FROM `". $this->table. "` where type='". $type. "') - (SELECT MIN(`qid`) FROM `". $this->table. "` where type='". $type. "')) + (SELECT MIN(`qid`) FROM `". $this->table. "` where type='". $type. "')) AS `id`) AS t2 WHERE t1.qid >= t2.id and type='". $type. "' ORDER BY t1.qid LIMIT 1";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid
     * 根据qid获取问题和答案信息
     */
    public function getQuestionOneById ($ucid, $qid) {
        $sql = "SELECT `article`, `question1` as `question`, `choices1` as `choices`, `q1type` as `qtype`, `answer1` as `answer`, `explain1` as `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid
     * 根据qid获取问题和答案信息
     */
    public function getQuestionTwoById ($ucid, $qid) {
        $sql = "SELECT `article`, `question2` as `question`, `choices2` as `choices`, `q2type` as `qtype`, `answer2` as `answer`, `explain2` as `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    /**
     * @param $qid  根据qid获取问题
     * @return  Array
     * 根据qid获取问题
     */
    public function getVerbalTwiceById ($qid) {
        $sql = "SELECT `article`, `question1` as `question`, `choices1` as `choices`, `q1type` as `qtype`, `answer1` as `answer`, `explain1` as `explain`, `question2`, `choices2`, `q2type`, `answer2`, `explain2` from `". $this->table. "` where `qid`='". $qid. "'";
        $data = $this->db->getData($sql);

        return $data;
    }

    public function getMaxVerbalTwiceId () {
        $sql = "SELECT MAX(`qid`) as max_id FROM `". $this->table. "`";
        $data = $this->db->getData($sql);

        return intval($data[0]['max_id']);
    }

}
