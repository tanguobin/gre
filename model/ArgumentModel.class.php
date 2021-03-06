<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-4-13
 * Time: 下午9:22
 * Argument Model
 */
class ArgumentModel {
    private $db;
    private $table = 'argument';

    static private $model;

    // 构造函数
    public function __construct () {
        // 初始化数据库连接
        $this->db = DB::getSaeMysql();
    }

    public static function getIssueModel () {
        if (!isset(self::$model)) {
            self::$model = new self();
        }
        return self::$model;
    }

    /**
     * @return int maxid
     * 返回最大的id
     */
    public function getMaxId () {
        $sql = "SELECT MAX(`id`) as max_id FROM `". $this->table. "`";
        $data = $this->db->getData($sql);

        return intval($data[0]['max_id']);
    }

    /**
     * @param $id
     * @return data
     * 根据id获取argument
     */
    public function getArgumentById ($id) {
        $sql = "SELECT `title`, `question` FROM `". $this->table. "` WHERE `id`=". $id;
        $data = $this->db->getData($sql);

        return $data;
    }

    /**
     * 随机获取一篇作文
     */
    public function getRandomArgument () {
        $sql = "SELECT * FROM `". $this->table. "` AS t1 JOIN (SELECT ROUND(RAND() * ((SELECT MAX(`id`) FROM `". $this->table. "`) - (SELECT MIN(`id`) FROM `". $this->table. "`)) + (SELECT MIN(`id`) FROM `". $this->table. "`)) AS `id`) AS t2 WHERE t1.id >= t2.id ORDER BY t1.id LIMIT 1";
        $data = $this->db->getData($sql);

        return $data;
    }
}
