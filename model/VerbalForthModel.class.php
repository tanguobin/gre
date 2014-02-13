<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-4-22
 * Time: 下午2:35
 * 四道题的阅读题
 */
class VerbalForthModel {

    private $db;
    private $table = 'verbal_reading_forth';

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
    public function getRandomVerbalByType ($type) {
        $sql = "SELECT `qid`, `article`, `question1`, `choices1`, `q1type`, `answer1`, `explain1`, `question2`, `choices2`, `q2type`, `answer2`, `explain2`, `question3`, `choices3`, `q3type`, `answer3`, `explain3`, `question4`, `choices4`, `q4type`, `answer4`, `explain4` FROM `". $this->table.
            "` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(`qid`) FROM `". $this->table. "` where type='". $type. "') - (SELECT MIN(`qid`) FROM `". $this->table.
            "` where type='". $type. "')) + (SELECT MIN(`qid`) FROM `". $this->table. "` where type='". $type. "')) AS `id`) AS t2 WHERE t1.qid >= t2.id and type='". $type. "' ORDER BY t1.qid LIMIT 1";
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

    public function getQuestionTwoById ($ucid, $qid) {
        $sql = "SELECT `article`, `question2` as `question`, `choices2` as `choices`, `q2type` as `qtype`, `answer2` as `answer`, `explain2` as `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    public function getQuestionThirdById ($ucid, $qid) {
        $sql = "SELECT `article`, `question3` as `question`, `choices3` as `choices`, `q3type` as `qtype`, `answer3` as `answer`, `explain3` as `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    public function getQuestionForthById ($ucid, $qid) {
        $sql = "SELECT `article`, `question4` as `question`, `choices4` as `choices`, `q4type` as `qtype`, `answer4` as `answer`, `explain4` as `explain`, `answers`, `qids` from `". $this->table. "`, `uc_reasoning` where `qid`='". $qid. "' and `id`='". $ucid. "'";
        $data = $this->db->getData($sql);
        return $data;
    }

    public function getVerbalForthById ($qid) {
        $sql = "SELECT `article`, `question1` as `question`, `choices1` as `choices`, `q1type` as `qtype`, `answer1` as `answer`, `explain1` as `explain`, `question2`, `choices2`, `q2type`, `answer2`, `explain2`, `question3`, `choices3`, `q3type`, `answer3`, `explain3`, `question4`, `choices4`, `q4type`, `answer4`, `explain4` from `". $this->table. "` where `qid`='". $qid. "'";
        $data = $this->db->getData($sql);

        return $data;
    }

    public function getMaxVerbalForthId () {
        $sql = "SELECT MAX(`qid`) as max_id FROM `". $this->table. "`";
        $data = $this->db->getData($sql);

        return intval($data[0]['max_id']);
    }


}
