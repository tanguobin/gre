<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 上午10:13
 * 个人中心历史数据
 */

class ViewAction extends BaseAction {

    private $context;
    protected $writingservice;
    protected $reasoningservice;
    protected $userservice;

	// 构造函数
	public function __construct() {
		BaseAction::__construct();
        $this->writingservice = new WritingService();
        $this->reasoningservice = new ReasoningService();
        $this->userservice = new UserService();
	}

    private function viewIssue () {
        $qid = str_replace('/', '', $this->context[3]);
        $article = $this->userservice->getUCWritingById('issue', $qid);
        if (null == $article[0]) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplParam('article', $article[0]);
        $this->setTplName('web/uc_writing.tpl');
        $this->render();
    }

    private function viewArgument () {
        $qid = str_replace('/', '', $this->context[3]);
        $article = $this->userservice->getUCWritingById('argument', $qid);
        if (null == $article[0]) {
            to404();
        }
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplParam('article', $article[0]);
        $this->setTplName('web/uc_writing.tpl');
        $this->render();
    }

    private function viewVerbal () {
        // 用户数据的ID
        $id = str_replace('/', '', $this->context[3]);
        // 问题的ID
        $qid = str_replace('/', '', $this->context[4]);
        // 第几个问题
        $index = intval(str_replace('/', '', $this->context[5]));
        if ($index < 1 || $index > 20) {
            to404();
        }
        if ($index > 0 && $index < 7) {
            $verbal = $this->reasoningservice->getVerbalSingleInfoById($id, $qid);
        } elseif ($index == 7) {
            $verbal = $this->reasoningservice->getVerbalLogicInfoById($id, $qid);
        } elseif ($index > 7 && $index < 12) {
            $verbal = $this->reasoningservice->getVerbalForthInfoById($id, $qid, $index);
            $verbal['start'] = 8;
            $verbal['to'] = 11;
        } elseif ($index > 11 && $index < 16) {
            $verbal = $this->reasoningservice->getVerbalMutipleInfoById($id, $qid);
        } elseif ($index > 15 && $index < 18) {
            $verbal = $this->reasoningservice->getVerbalTwiceInfoById($id, $qid, $index);
            $verbal['start'] = 16;
            $verbal['to'] = 17;
        } elseif ($index > 17 && $index < 21) {
            $verbal = $this->reasoningservice->getVerbalThirdInfoById($id, $qid, $index);
            $verbal['start'] = 18;
            $verbal['to'] = 20;
        }

        $answers = explode('/', $verbal['answers']);
        $qids = explode('/', $verbal['qids']);
        // 数据不存在
        if (null == $verbal['question'] || $qid !== $qids[$index - 1]) {
            to404();
        }

        $verbal['index'] = $index;
        $verbal['choices'] = $this->stringToArray($verbal['choices']);
        $nextqid = $qids[$index];
        $useranswer = $answers[$index - 1];
        $correntanswer = $verbal['answer'];
        if ($useranswer == $correntanswer) {
            $verbal['isRight'] = true;
        } else {
            $verbal['isRight'] = false;
        }
        $verbal['nextQid'] = $nextqid;
        $verbal['userAnswer'] = $useranswer;
        $verbal['index'] = $index;

        $this->setTplParam('verbal', $verbal);
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/uc_v.tpl');
        $this->render();
    }

    private function viewQuantity () {
        $id = str_replace('/', '', $this->context[3]);
        $qid = str_replace('/', '', $this->context[4]);
        $index = intval(str_replace('/', '', $this->context[5]));
        if ($index < 1 || $index > 20) {
            to404();
        }

        if ($index > 0 && $index < 9) {
            $quantity = $this->reasoningservice->getQuantityQSInfoById($id, $qid);
        } elseif ($index > 8 && $index < 17) {
            $quantity = $this->reasoningservice->getQuantitySelectInfoById($id, $qid);
            $quantity['choices'] = $this->stringToArray($quantity['choices']);
        } elseif ($index > 16 && $index < 21) {
            $quantity = $this->reasoningservice->getQuantityInputInfoById($id, $qid);
        }

        $answers = explode('/', $quantity['answers']);
        $qids = explode('/', $quantity['qids']);

        // 数据不存在
        if (null == $quantity['question'] || $qid !== $qids[$index - 1]) {
            to404();
        }

        $nextqid = $qids[$index];
        $useranswer = $answers[$index - 1];
        $correntanswer = $quantity['answer'];
        if ($useranswer == $correntanswer) {
            $quantity['isRight'] = true;
        } else {
            $quantity['isRight'] = false;
        }
        $quantity['nextQid'] = $nextqid;
        $quantity['userAnswer'] = $useranswer;
        $quantity['index'] = $index;
        $this->setTplParam('quantity', $quantity);
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/uc_q.tpl');
        $this->render();
    }

	public function execute ($context) {
        $this->context = $context;
        $type = $context[2];

        // function分发
        switch ($type) {
            case 'issue':
                $this->viewIssue();
                break;
            case 'argument':
                $this->viewArgument();
                break;
            case 'verbal':
                $this->viewVerbal();
                break;
            case 'quantity':
                $this->viewQuantity();
                break;
            default:
                to404();
                break;
        }
	}
}