<?php
/**
 * Created by gstan
 * User: tanguoshuai
 * Date: 2012-4-6
 * Time: 下午12:29
 * home页面，如verbal页面，quantity页面，help帮助页面
 */

class HomeAction extends BaseAction {
    private $type;

    protected $userservice;

    // 构造函数
    public  function __construct() {
        parent::__construct();
        $this->userservice = new UserService();
    }

    private function verbalHome () {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/index_v.tpl');
        $this->render();
    }

    private function quantityHome () {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/index_q.tpl');
        $this->render();
    }

    private function ucHome () {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);

        $argumentcount = $this->userservice->getCountOfUCArgument();
        $issuecount = $this->userservice->getCountOfUCIssue();
        $verbalcount = $this->userservice->getCountOfUCVerbal();
        $quantitycount = $this->userservice->getCountOfUCQuantity();

        $issuelist = $this->userservice->getUCIssueByCount(0, 20);

        $issue = array(
            'count' => $issuecount,
            'list' => $issuelist
        );
        $argument = array(
            'count' => $argumentcount
        );
        $verbal = array(
            'count' => $verbalcount
        );
        $quantity = array(
            'count' => $quantitycount
        );
        $tab = array(
            'type' => 'issue',
            'list' => $issuelist
        );
        $this->setTplParam('tab', $tab);
        $this->setTplParam('issue', $issue);
        $this->setTplParam('argument', $argument);
        $this->setTplParam('verbal', $verbal);
        $this->setTplParam('quantity', $quantity);

        $this->setTplName('web/index_uc.tpl');
        $this->render();
    }

    private function helpHome () {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/index_help.tpl');
        $this->render();
    }

    private function poolHome () {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/index_pool.tpl');
        $this->render();
    }

    public function execute ($context) {
        $this->type = $context[1];

        switch ($this->type) {
            case 'verbal':
                $this->verbalHome();
                break;
            case 'quantity':
                $this->quantityHome();
                break;
            case 'uc':
                $this->ucHome();
                break;
            case 'help':
                $this->helpHome();
                break;
            case 'pool':
                $this->poolHome();
                break;
            default:
                to404();
                break;
        }
    }

    //析构函数
    function __destruct() {}
}