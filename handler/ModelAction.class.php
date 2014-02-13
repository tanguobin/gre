<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 下午12:29
 * 全真模考
 */

class ModelAction extends BaseAction {

    protected $type;

    // 构造函数
    public function __construct () {
        BaseAction::__construct();
    }

    // issue训练
    private function awIssue () {
        $this->setTplParam('title', '- Analytical Writing(Analyze an Issue)');
        $this->setTplParam('dependfn', 'inc_issue_qd.html');
        $operation = array(
            'hasContinue' => array(
                'url' => '/ajax/writing/getIssue'
            ),
            'hasQuit' => array(),
            'hasExit' => array(),
            'hasHelp' => array(
                'url' => '/ajax/writing/help'
            )
        );
        $this->setTplParam('operation', $operation);
        $this->setTplName('web/desc.tpl');
        $this->render();
    }

    // issue结果页
    private function issueResult () {
        $cuthost = str_replace($_SERVER['HTTP_HOST'], '', $_SERVER['HTTP_REFERER']);
        $cuthttp = str_replace('http://', '', $cuthost);
        if ($cuthttp != "/modeltest/issue") {
            echo '<script type="text/javascript">location.href="/modeltest/issue"</script>';
            return;
        }
        $this->setTplParam('sectionType', 'issue');
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/result_write.tpl');
        $this->render();
    }

    // argument结果页
    private function argumentResult () {
        $cuthost = str_replace($_SERVER['HTTP_HOST'], '', $_SERVER['HTTP_REFERER']);
        $cuthttp = str_replace('http://', '', $cuthost);
        if ($cuthttp != "/modeltest/argument") {
            echo '<script type="text/javascript">location.href="/modeltest/argument"</script>';
            return;
        }
        $this->setTplParam('sectionType', 'argument');
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/result_write.tpl');
        $this->render();
    }

    // argument训练
    private function awArgument () {
        $this->setTplParam('title', '- Analytical Writing(Analyze an Argument)');
        $this->setTplParam('dependfn', 'inc_argument_qd.html');
        $operation = array(
            'hasContinue' => array(
                'url' => '/ajax/writing/getArgument'
            ),
            'hasQuit' => array(),
            'hasExit' => array(),
            'hasHelp' => array(
                'url' => '/ajax/writing/help'
            )
        );
        $this->setTplParam('operation', $operation);
        $this->setTplName('web/desc.tpl');
        $this->render();
    }

    // 语言推理训练
    private function verbalReasoning () {
        $this->setTplParam('title', '- Verbal Reasoning');
        $this->setTplParam('dependfn', 'inc_verbal_sd.html');
        $operation = array(
            'hasContinue' => array(
                'url' => '/ajax/verbal/pt1'
            ),
            'hasQuit' => array(),
            'hasExit' => array(),
            'hasHelp' => array(
                'url' => '/ajax/verbal/help'
            )
        );
        $this->setTplParam('operation', $operation);
        $this->setTplName('web/desc.tpl');
        $this->render();
    }

    // 数理推理训练
    private function quantiveReasoning () {
        $this->setTplParam('title', '- Quantitative Reasoning');
        $this->setTplParam('dependfn', 'inc_quantity_sd.html');
        $operation = array(
            'hasContinue' => array(
                'url' => '/ajax/quantity/pt1'
            ),
            'hasQuit' => array(),
            'hasExit' => array(),
            'hasHelp' => array(
                'url' => '/ajax/quantity/help'
            )
        );
        $this->setTplParam('operation', $operation);
        $this->setTplName('web/desc.tpl');
        $this->render();
    }

    // 文字推理结果页
    private function verbalResult () {
        $this->setTplParam('sectionType', 'verbal');
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/result_reason.tpl');
        $this->render();
    }

    // 数理推理结果页
    private function quantiveResult () {
        $this->setTplParam('sectionType', 'quantity');
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/result_reason.tpl');
        $this->render();
    }

    public function execute ($context) {

        $this->type = $context[2];

        // function分发
        switch ($this->type) {
            case 'issue':
                $this->awIssue();
                break;
            case 'issue/result':
                $this->issueResult();
                break;
            case 'argument':
                $this->awArgument();
                break;
            case 'argument/result':
                $this->argumentResult();
                break;
            case 'verbal':
                $this->verbalReasoning();
                break;
            case 'verbal/result':
                $this->verbalResult();
                break;
            case 'quantity':
                $this->quantiveReasoning();
                break;
            case 'quantity/result':
                $this->quantiveResult();
                break;
            default:
                to404();
                break;
        }
    }
}