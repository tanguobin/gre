<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-5-17
 * Time: 下午11:19
 * 用户相关的数据
 */
class UserService {

    private $usermodel;
    private $ucwritingmodel;
    private $ucreasoningmodel;

    private $service;

    // 构造函数
    public function __construct () {
        if ($this->service == null) {
            $this->usermodel = UserModel::getModel();
            $this->ucwritingmodel = UCWritingModel::getModel();
            $this->ucreasoningmodel = UCReasoningModel::getModel();
        }
    }

    /**
     * 插入个人推理部分的数据
     * @param $qids
     * @param $answers
     * @return bool
     */
    public function insertUCReasoning ($qids, $startqid, $answers, $type) {
        $username = $_SESSION['userInfo']['username'];
        if (!get_magic_quotes_gpc()) {
            $qids = addslashes($qids);
            $answers = addslashes($answers);
        }
        $result = $this->ucreasoningmodel->insertUCReasoning($username, $qids, $startqid, $answers, $type);
        return $result === 0 ? true : false;
    }

    /**
     * 插入个人写作数据
     * @param $sid
     * @param $article
     */
    public function insertUCWriting ($sid, $article, $type) {
        $username = $_SESSION['userInfo']['username'];
        if (!get_magic_quotes_gpc()) {
            $article = addslashes($article);
        }
        $result = $this->ucwritingmodel->insertUCWriting($username, $sid, $article, $type);
        return $result === 0 ? true : false;
    }

    /**
     * 获得指定数目的issue
     * @param $count
     * @return mixed
     */
    public function getUCIssueByCount ($start, $count) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucwritingmodel->getUCWriting($username, 'issue', $start, $count);

        return $info;
    }

    /**
     * 获得指定数目的argument
     * @param $count
     * @return mixed
     */
    public function getUCArgumentByCount ($start, $count) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucwritingmodel->getUCWriting($username, 'argument', $start, $count);

        return $info;
    }

    /**
     * 根据ID获得指定的用户文章
     * @param $id
     * @return mixed
     */
    public function getUCWritingById ($type, $id) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucwritingmodel->getUCWritingById($username, $type, $id);

        return $info;
    }

    /**
     * 根据ID获得指定的用户推理
     * @param $id
     * @return mixed
     */
    public function getUCReasoningById ($id) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucreasoningmodel->getUCReasoningById($username, $id);

        return $info;
    }


    /**
     * 获得指定数目的verbal
     * @param $start
     * @param $count
     * @return mixed
     */
    public function getUCVerbalByCount ($start, $count) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucreasoningmodel->getUCReasoning($username, 'verbal', $start, $count);

        return $info;
    }

    /**
     * 获得指定数目的quantity
     * @param $start
     * @param $count
     * @return mixed
     */
    public function getUCQuantityByCount ($start, $count) {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucreasoningmodel->getUCReasoning($username, 'quantity', $start, $count);

        return $info;
    }

    /**
     * 得到某个用户的argument的条数
     * @return int
     */
    public function getCountOfUCArgument () {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucwritingmodel->getUCWritingCount($username, 'argument');

        return intval($info[0]['cnt']);
    }

    /**
     * 得到某个用户的issue的条数
     * @return int
     */
    public function getCountOfUCIssue () {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucwritingmodel->getUCWritingCount($username, 'issue');

        return intval($info[0]['cnt']);
    }

    /**
     * 得到某个用户的verbal的条数
     * @return int
     */
    public function getCountOfUCVerbal () {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucreasoningmodel->getUCReasoningCount($username, 'verbal');

        return intval($info[0]['cnt']);
    }

    /**
     * 得到某个用户的quantity的条数
     * @return int
     */
    public function getCountOfUCQuantity () {
        $username = $_SESSION['userInfo']['username'];
        $info = $this->ucreasoningmodel->getUCReasoningCount($username, 'quantity');

        return intval($info[0]['cnt']);
    }

    /**
     * 判断用户是否存在
     * @param $username
     * @return bool
     */
    public function isUserNameExist ($username) {
        $info = $this->usermodel->getUserInfo($username);
        if ($info === false || $info === null) {
            return false;
        }
        return true;
    }

    /**
     * 插入一条用户记录
     * @param $email
     * @param $username
     * @param $password
     * @return mixed
     */
    public function insertUser ($email, $username, $password) {
        $uid = md5($username. $password);
        $password = md5($password);
        $result = $this->usermodel->insertUser($uid, $email, $username, $password);
        return $result === 0 ? 1 : 0;
    }

    /**
     * 判断登录的用户是否存在
     * @param $username
     * @param $password
     * @return bool
     */
    public function isUserExist ($username, $password) {
        $password = md5($password);
        $info = $this->usermodel->getLoginInfo($username, $password);
        return $info;
    }

    /**
     * @param $uid
     * @return mixed
     */
    public function isUserExistByUid ($uid) {
        $info = $this->usermodel->getLoginInfoByUid($uid);
        return $info;
    }
}
