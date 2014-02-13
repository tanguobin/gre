<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 2012-4-16
 * Time: 下午9:28
 * 语文推理和数学推理
 */
class ReasoningService {
    private $verbalscmodel;
    private $verballogicmodel;
    private $verbalforthmodel;
    private $verbalmcmodel;
    private $verbaltwicemodel;
    private $verbalthirdmodel;

    private $quantitycomparemodel;
    private $quantityselectmodel;
    private $quantityinputmodel;

    private $service;

    // 构造函数
    public function __construct () {
        if ($this->service == null) {
            $this->verbalscmodel = VerbalSingleModel::getModel();
            $this->verballogicmodel = VerbalLogicModel::getModel();
            $this->verbalforthmodel = VerbalForthModel::getModel();
            $this->verbalmcmodel = VerbalMultipleModel::getModel();
            $this->verbaltwicemodel = VerbalTwiceModel::getModel();
            $this->verbalthirdmodel = VerbalThirdModel::getModel();

            $this->quantitycomparemodel = QuantityCompareModel::getModel();
            $this->quantityselectmodel = QuantitySelectModel::getModel();
            $this->quantityinputmodel = QuantityInputModel::getModel();
        }
    }

    /**
     * @param $type  题目的类型，easy，medium，hard
     * @param $num   随机获取num条记录
     * @return mixed 返回题目
     */
    public function getVerbalSingleQSByNumber ($type, $num) {
        $verbal = $this->verbalscmodel->getRandomQuestionsByType($type, $num);
        return $verbal;
    }

    /**
     *
     * @param $id
     * @param $qid
     * @return mixed
     */
    public function getVerbalSingleInfoById ($id, $qid) {
        $verbal = $this->verbalscmodel->getQuestionById($id, $qid);
        return $verbal[0];
    }

    /**
     * @param $qid
     * @return mixed
     * 根据ID获取问题
     */
    public function getVerbalSingleById ($qid) {
        $verbal = $this->verbalscmodel->getVerbalSingleById($qid);
        return $verbal[0];
    }

    /**
     * @return mixed
     * 获得文字推理单选题最大的ID
     */
    public function getMaxVerbalSingleId () {
        return $this->verbalscmodel->getMaxVerbalSingleId();
    }

    /**
     * @param $type  题目的类型，easy，medium，hard
     * @param $num   随机获取num条记录
     * @return mixed 返回题目
     */
    public function getVerbalMutipleQSByNumber ($type, $num) {
        $verbal = $this->verbalmcmodel->getRandomQuestionsByType($type, $num);
        return $verbal;
    }

    public function getVerbalMutipleInfoById ($id, $qid) {
        $verbal = $this->verbalmcmodel->getQuestionById($id, $qid);
        return $verbal[0];
    }

    /**
     * @param $qid
     * @return mixed
     * 根据ID获取问题
     */
    public function getVerbalMultipleById ($qid) {
        $verbal = $this->verbalmcmodel->getVerbalMutipleById($qid);
        return $verbal[0];
    }

    /**
     * @return mixed
     * 获得文字推理多选题最大的ID
     */
    public function getMaxVerbalMultipleId () {
        return $this->verbalmcmodel->getMaxVerbalMultipleId();
    }

    /**
     * @param $type 题目的类型，easy，medium，hard
     * @return mixed 返回题目
     */
    public function getVerbalLogicByType ($type) {
        $question = $this->verballogicmodel->getRandomQuestionByType($type);
        return $question;
    }

    /**
     *
     * @param $id
     * @param $qid
     * @return mixed
     */
    public function getVerbalLogicInfoById ($id, $qid) {
        $verbal = $this->verballogicmodel->getQuestionById($id, $qid);
        return $verbal[0];
    }

    /**
     * @param $qid
     * @return mixed
     * 根据ID获取问题
     */
    public function getVerbalLogicById ($qid) {
        $verbal = $this->verballogicmodel->getVerbalLogicById($qid);
        return $verbal[0];
    }

    /**
     * @return mixed
     * 获得文字推理逻辑题最大的ID
     */
    public function getMaxVerbalLogicId () {
        return $this->verballogicmodel->getMaxVerbalLogicId();
    }

    /**
     * @param $type 题目的类型，easy，medium，hard
     * @return mixed 返回题目
     */
    public function getVerbalForthByType ($type) {
        $verbal = $this->verbalforthmodel->getRandomVerbalByType($type);
        return $verbal;
    }

    /**
     * @param $id
     * @param $qid
     * @return mixed
     */
    public function getVerbalForthInfoById ($id, $qid, $index) {
        if ($index === 8) {
            $verbal = $this->verbalforthmodel->getQuestionOneById($id, $qid);
        } elseif ($index === 9) {
            $verbal = $this->verbalforthmodel->getQuestionTwoById($id, $qid);
        } elseif ($index === 10) {
            $verbal = $this->verbalforthmodel->getQuestionThirdById($id, $qid);
        } elseif ($index === 11) {
            $verbal = $this->verbalforthmodel->getQuestionForthById($id, $qid);
        }
        return $verbal[0];
    }

    public function getVerbalForthById ($qid) {
        $verbal = $this->verbalforthmodel->getVerbalForthById($qid);
        return $verbal[0];
    }

    /**
     * @return mixed
     * 获得文字推理逻辑题最大的ID
     */
    public function getMaxVerbalForthId () {
        return $this->verbalforthmodel->getMaxVerbalForthId();
    }

    /**
     * @param $type 题目的类型，easy，medium，hard
     * @return mixed 返回题目
     */
    public function getVerbalTwiceByType ($type) {
        $verbal = $this->verbaltwicemodel->getRandomVerbalByType($type);
        return $verbal;
    }

    public function getVerbalTwiceInfoById ($id, $qid, $index) {
        if ($index === 16) {
            $verbal = $this->verbaltwicemodel->getQuestionOneById($id, $qid);
        } elseif ($index === 17) {
            $verbal = $this->verbaltwicemodel->getQuestionTwoById($id, $qid);
        }
        return $verbal[0];
    }

    public function getVerbalTwiceById ($qid) {
        $verbal = $this->verbaltwicemodel->getVerbalTwiceById($qid);
        return $verbal[0];
    }

    public function getMaxVerbalTwiceId () {
        return $this->verbaltwicemodel->getMaxVerbalTwiceId();
    }

    /**
     * @param $type 题目的类型，easy，medium，hard
     * @return mixed 返回题目
     */
    public function getVerbalThirdByType ($type) {
        $verbal = $this->verbalthirdmodel->getRandomVerbalByType($type);
        return $verbal;
    }

    public function getVerbalThirdInfoById ($id, $qid, $index) {
        if ($index === 18) {
            $verbal = $this->verbalthirdmodel->getQuestionOneById($id, $qid);
        } elseif ($index === 19) {
            $verbal = $this->verbalthirdmodel->getQuestionTwoById($id, $qid);
        } elseif ($index === 20) {
            $verbal = $this->verbalthirdmodel->getQuestionThirdById($id, $qid);
        }
        return $verbal[0];
    }

    public function getVerbalThirdById ($qid) {
        $verbal = $this->verbalthirdmodel->getVerbalThirdById($qid);
        return $verbal[0];
    }

    public function getMaxVerbalThirdId () {
        return $this->verbalthirdmodel->getMaxVerbalThirdId();
    }

    /**
     * @param $type  题目的类型，easy，medium，hard
     * @param $num   随机获取num条记录
     * @return mixed 返回题目
     */
    public function getQuantityQSByNumber ($type, $num) {
        $quantities = $this->quantitycomparemodel->getRandomQuestionsByType($type, $num);
        return $quantities;
    }

    public function getQuantityQSInfoById ($id, $qid) {
        $quantity = $this->quantitycomparemodel->getQuestionById($id, $qid);
        return $quantity[0];
    }

    public function getQuantityCompareById ($qid) {
        $quantity = $this->quantitycomparemodel->getQuantityCompareById($qid);
        return $quantity[0];
    }

    public function getMaxQuantityCompareId () {
        return $this->quantitycomparemodel->getMaxQuantityCompareId();
    }

    /**
     * @param $type  题目的类型，easy，medium，hard
     * @param $num   随机获取num条记录
     * @return mixed 返回选择题题目
     */
    public function getQuantitySelectByNumber ($type, $num) {
        $quantities = $this->quantityselectmodel->getRandomQuestionsByType($type, $num);
        return $quantities;
    }

    public function getQuantitySelectInfoById ($id, $qid) {
        $quantity = $this->quantityselectmodel->getQuestionById($id, $qid);
        return $quantity[0];
    }

    public function getQuantitySelectById ($qid) {
        $quantity = $this->quantityselectmodel->getQuantitySelectById($qid);
        return $quantity[0];
    }

    public function getMaxQuantitySelectId () {
        return $this->quantityselectmodel->getMaxQuantitySelectId();
    }

    /**
     * @param $type  题目的类型，easy，medium，hard
     * @param $num   随机获取num条记录
     * @return mixed 返回输入框题目
     */
    public function getQuantityInputByNumber ($type, $num) {
        $quantities = $this->quantityinputmodel->getRandomQuestionsByType($type, $num);
        return $quantities;
    }

    public function getQuantityInputInfoById ($id, $qid) {
        $quantity = $this->quantityinputmodel->getQuestionById($id, $qid);
        return $quantity[0];
    }

    public function getQuantityInputById ($qid) {
        $quantity = $this->quantityinputmodel->getQuantityInputById($qid);
        return $quantity[0];
    }

    public function getMaxQuantityInputId () {
        return $this->quantityinputmodel->getMaxQuantityInputId();
    }

}
