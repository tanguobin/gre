<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 上午10:13
 * 题集
 */

class PoolAction extends BaseAction {

    protected $writingservice;
    protected $reasoningservice;
    protected $maxIssueId;
    protected $maxArgumentId;
    protected $maxVerbalSingleId;
    protected $maxVerbalLogicId;
    protected $maxVerbalTwiceId;
    protected $maxVerbalThirdId;
    protected $maxVerbalForthId;
    protected $maxVerbalMultipleId;

    protected $maxQuantityCompareId;
    protected $maxQuantitySelectId;
    protected $maxQuantityInputId;

    // 构造函数
    public function __construct() {
        BaseAction::__construct();
        $this->writingservice = new WritingService();
        $this->reasoningservice = new ReasoningService();
        $this->maxIssueId = $this->writingservice->getMaxIssueId();
        $this->maxArgumentId = $this->writingservice->getMaxArgumentId();
        $this->maxVerbalSingleId = $this->reasoningservice->getMaxVerbalSingleId();
        $this->maxVerbalLogicId = $this->reasoningservice->getMaxVerbalLogicId();
        $this->maxVerbalTwiceId = $this->reasoningservice->getMaxVerbalTwiceId();
        $this->maxVerbalThirdId = $this->reasoningservice->getMaxVerbalThirdId();
        $this->maxVerbalForthId = $this->reasoningservice->getMaxVerbalForthId();
        $this->maxVerbalMultipleId = $this->reasoningservice->getMaxVerbalMultipleId();

        $this->maxQuantityCompareId = $this->reasoningservice->getMaxQuantityCompareId();
        $this->maxQuantitySelectId = $this->reasoningservice->getMaxQuantitySelectId();
        $this->maxQuantityInputId = $this->reasoningservice->getMaxQuantityInputId();
    }

    function getIssueById ($qid) {
        $issue = $this->writingservice->getAnIssueById($qid);
        if (null == $issue) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $issue['id'] = $qid;
        $issue['type'] = 'issue';
        $this->setTplParam('article', $issue);
        $this->setTplParam('maxId', $this->maxIssueId);
        $this->setTplName('web/pool_write.tpl');
        $this->render();
    }

    function getArgumentById ($qid) {
        $argument = $this->writingservice->getAnArgumentById($qid);
        if (null == $argument) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $argument['id'] = $qid;
        $argument['type'] = 'argument';
        $this->setTplParam('article', $argument);
        $this->setTplParam('maxId', $this->maxArgumentId);
        $this->setTplName('web/pool_write.tpl');
        $this->render();
    }

    function getVerbalSingleById ($qid) {
        $verbal = $this->reasoningservice->getVerbalSingleById($qid);
        if (null == $verbal) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $verbal['id'] = $qid;
        $verbal['maxId'] = $this->maxVerbalSingleId;
        $verbal['type'] = 'verbal单选';
        $verbal['action'] = 'vsingle';
        $verbal['choices'] = $this->stringToArray($verbal['choices']);
        $this->setTplParam('verbal', $verbal);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getVerbalMultipleById ($qid) {
        $verbal = $this->reasoningservice->getVerbalMultipleById($qid);
        if (null == $verbal) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $verbal['id'] = $qid;
        $verbal['maxId'] = $this->maxVerbalMultipleId;
        $verbal['type'] = 'verbal多选';
        $verbal['action'] = 'vmult';
        $verbal['choices'] = $this->stringToArray($verbal['choices']);
        $this->setTplParam('verbal', $verbal);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getVerbalLogicById ($qid) {
        $verbal = $this->reasoningservice->getVerbalLogicById($qid);
        if (null == $verbal) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $verbal['id'] = $qid;
        $verbal['maxId'] = $this->maxVerbalLogicId;
        $verbal['type'] = 'verbal逻辑题';
        $verbal['action'] = 'vlogic';
        $verbal['choices'] = $this->stringToArray($verbal['choices']);
        $this->setTplParam('verbal', $verbal);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getVerbalReadingById ($qid) {
        $qid = intval($qid);
        if ($qid <= $this->maxVerbalTwiceId) {
            $verbal = $this->reasoningservice->getVerbalTwiceById($qid);
        } elseif ($qid > $this->maxVerbalTwiceId
            && $qid <= $this->maxVerbalTwiceId + $this->maxVerbalThirdId) {
            $verbal = $this->reasoningservice->getVerbalThirdById($qid - $this->maxVerbalTwiceId);
        } elseif ($qid > $this->maxVerbalTwiceId + $this->maxVerbalThirdId
            && $qid <= $this->maxVerbalTwiceId + $this->maxVerbalThirdId + $this->maxVerbalForthId) {
            $verbal = $this->reasoningservice->getVerbalForthById($qid - $this->maxVerbalTwiceId - $this->maxVerbalThirdId);
        }
        if (null == $verbal) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $verbal['id'] = $qid;
        $verbal['type'] = 'verbal阅读题';
        $verbal['action'] = 'vreading';
        $verbal['choices'] = $this->stringToArray($verbal['choices']);
        if ($verbal['choices2']) {
            $verbal['choices2'] = $this->stringToArray($verbal['choices2']);
        }
        if ($verbal['choices3']) {
            $verbal['choices3'] = $this->stringToArray($verbal['choices3']);
        }
        if ($verbal['choices4']) {
            $verbal['choices4'] = $this->stringToArray($verbal['choices4']);
        }
        $verbal['maxId'] = $this->maxVerbalTwiceId + $this->maxVerbalThirdId + $this->maxVerbalForthId;
        $this->setTplParam('verbal', $verbal);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getQuantityCompareById ($qid) {
        $quantity = $this->reasoningservice->getQuantityCompareById($qid);
        if (null == $quantity) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $quantity['id'] = $qid;
        $quantity['maxId'] = $this->maxQuantityCompareId;
        $quantity['type'] = 'quantity比较题';
        $quantity['action'] = 'qcompare';
        $this->setTplParam('quantity', $quantity);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getQuantitySelectById ($qid) {
        $quantity = $this->reasoningservice->getQuantitySelectById($qid);
        if (null == $quantity) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $quantity['id'] = $qid;
        $quantity['maxId'] = $this->maxQuantitySelectId;
        $quantity['type'] = 'quantity选择题';
        $quantity['action'] = 'qselect';
        $quantity['choices'] = $this->stringToArray($quantity['choices']);
        $this->setTplParam('quantity', $quantity);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    function getQuantityInputById ($qid) {
        $quantity = $this->reasoningservice->getQuantityInputById($qid);
        if (null == $quantity) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $quantity['id'] = $qid;
        $quantity['maxId'] = $this->maxQuantityInputId;
        $quantity['type'] = 'quantity填空题';
        $quantity['action'] = 'qinput';
        $this->setTplParam('quantity', $quantity);
        $this->setTplName('web/pool_reason.tpl');
        $this->render();
    }

    public function execute ($context) {
        $type = $context[1];
        $qid = $context[3];

        switch ($type) {
            case 'issue':
                $this->getIssueById($qid);
                break;
            case 'argument':
                $this->getArgumentById($qid);
                break;
            case 'vsingle':
                $this->getVerbalSingleById($qid);
                break;
            case 'vmult':
                $this->getVerbalMultipleById($qid);
                break;
            case 'vlogic':
                $this->getVerbalLogicById($qid);
                break;
            case 'vreading':
                $this->getVerbalReadingById($qid);
                break;
            case 'qcompare':
                $this->getQuantityCompareById($qid);
                break;
            case 'qselect':
                $this->getQuantitySelectById($qid);
                break;
            case 'qinput':
                $this->getQuantityInputById($qid);
                break;
            default:
                to404();
                break;
        }
    }
}