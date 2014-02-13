<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-7
 * Time: 下午8:26
 * Ajax请求入口
 */

class AjaxAction extends BaseAction {

    protected $type;
    protected $writingservice;
    protected $reasoningservice;
    protected $userservice;

    // 构造函数
    public function __construct () {
        BaseAction::__construct();
        $this->writingservice = new WritingService();
        $this->reasoningservice = new ReasoningService();
        $this->userservice = new UserService();
    }

    // 写作部分的帮助文档
    private function writingHelp () {
        $help = array(
            'tabList' => array(
                array('name' => 'Question Directions'),
                array('name' => 'Section Directions'),
                array('name' => 'General Directions'),
                array('name' => 'Testing Tools'),
                array('name' => 'How To Answer')
            )
        );

        $tabHtml = $this->getModuleHtml('tab', $help, 'help');
        $issueGdHtml = $this->getWidgetHtml('section_gd');
        $issueHtaHtml = $this->getWidgetHtml('writing_hta');
        $issueSdHtml = $this->getWidgetHtml('writing_sd');
        $issueTtHtml = $this->getWidgetHtml('writing_tt');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "tabHtml" => $tabHtml,
                "gdHtml" => $issueGdHtml,
                "htaHtml" => $issueHtaHtml,
                "sdHtml" => $issueSdHtml,
                "ttHtml" => $issueTtHtml
            )
        );

        echo json_encode($output);
    }

    // 语言推理部分的帮助文档
    private function verbalHelp () {
        $help = array(
            'tabList' => array(
                array('name' => 'Section Directions'),
                array('name' => 'General Directions'),
                array('name' => 'Testing Tools')
            )
        );

        $tabHtml = $this->getModuleHtml('tab', $help, 'help');
        $gdHtml = $this->getWidgetHtml('section_gd');
        $ttHtml = $this->getWidgetHtml('verbal_tt');


        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "tabHtml" => $tabHtml,
                "gdHtml" => $gdHtml,
                "ttHtml" => $ttHtml
            )
        );

        echo json_encode($output);
    }

    // get一篇issue
    private function getIssue () {
        $issue = $this->writingservice->getAnIssue();
        $issueHtml = $this->getModuleHtml('writing', $issue[0], 'article');

        // 使用head_tip.html中提供的default值
        $headTip = $this->getModuleHtml('head_tip');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "writingHtml" => $issueHtml,
                "headTip" => $headTip
            )
        );

        echo json_encode($output);
    }

    // get一篇argument
    private function getArgument () {
        $argument = $this->writingservice->getAnArgument();
        $argumentHtml = $this->getModuleHtml('writing', $argument[0], 'article');

        // 使用head_tip.html中提供的default值
        $headTip = $this->getModuleHtml('head_tip');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "writingHtml" => $argumentHtml,
                "headTip" => $headTip
            )
        );
        echo json_encode($output);
    }

    private function nextTip () {
        $nextTip = $this->getWidgetHtml('nofinished');
        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $nextTip
        );

        echo json_encode($output);
    }

    // 语言推理部分单项选择题
    private function getVerbalSC () {
        $types = array("easy", "medium", "hard");
        $type = $types[rand(0, 2)];
        $count = 6;
        $verbals = $this->reasoningservice->getVerbalSingleQSByNumber($type, $count);
        $verbalsArray = array();
        for ($i = 0; $i < $count; $i++) {
            $verbals[$i]['choices'] = $this->stringToArray($verbals[$i]['choices']);
            $verbals[$i]['index'] = $i + 1;
            $verbalHtml = $this->getModuleHtml('verbal_single', $verbals[$i], 'verbal');
            $verbalsArray[$i] = $verbalHtml;
        }

        // 使用head_tip.html中提供的default值
        $headTip = $this->getModuleHtml('head_tip', array('total' => 20), 'question');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $verbalsArray,
                "headTip" => $headTip
            )
        );

        echo json_encode($output);
    }

    // 语言推理部分多选题
    private function getVerbalMC () {
        $type = $_GET['type'];
        $count = 4;
        $verbals = $this->reasoningservice->getVerbalMutipleQSByNumber($type, $count);

        $verbalsArray = array();
        for ($i = 0; $i < $count; $i++) {
            $verbals[$i]['choices'] = $this->stringToArray($verbals[$i]['choices']);
            $verbals[$i]['index'] = $i + 12;
            $verbalHtml = $this->getModuleHtml('verbal_multiple', $verbals[$i], 'verbal');
            $verbalsArray[$i] = $verbalHtml;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $verbalsArray
            )
        );
        echo json_encode($output);
    }

    // 语言推理部分逻辑题
    private function getVerbalLogic () {

        $type = $_GET['type'];

        $verbal = $this->reasoningservice->getVerbalLogicByType($type);

        $verbal[0]['choices'] = $this->stringToArray($verbal[0]['choices']);
        $verbal[0]['index'] = 7;

        $reading = $this->getModuleHtml('verbal_reading', $verbal[0], 'reading');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $reading
            )
        );
        echo json_encode($output);
    }

    // 获取四个题目的阅读题
    private function getVerbalForth () {
        $type = $_GET['type'];

        $verbal = $this->reasoningservice->getVerbalForthByType($type);

        $verbal[0]['index'] = 8;
        $verbal[0]['start'] = 8;
        $verbal[0]['to'] = 11;
        $verbal[0]['qtype'] = $verbal[0]['q1type'];
        $verbal[0]['question'] = $verbal[0]['question1'];
        $verbal[0]['choices'] = $this->stringToArray($verbal[0]['choices1']);
        $verbal[0]['choices2'] = $this->stringToArray($verbal[0]['choices2']);
        $verbal[0]['choices3'] = $this->stringToArray($verbal[0]['choices3']);
        $verbal[0]['choices4'] = $this->stringToArray($verbal[0]['choices4']);

        $reading = $this->getModuleHtml('verbal_reading', $verbal[0], 'reading');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $reading
            )
        );

        echo json_encode($output);
    }

    // 获取两个题的阅读题
    private function getVerbalTwice () {
        $type = $_GET['type'];

        $verbal = $this->reasoningservice->getVerbalTwiceByType($type);

        $verbal[0]['index'] = 16;
        $verbal[0]['start'] = 16;
        $verbal[0]['to'] = 17;
        $verbal[0]['qtype'] = $verbal[0]['q1type'];
        $verbal[0]['question'] = $verbal[0]['question1'];
        $verbal[0]['choices'] = $this->stringToArray($verbal[0]['choices1']);
        $verbal[0]['choices2'] = $this->stringToArray($verbal[0]['choices2']);

        $reading = $this->getModuleHtml('verbal_reading', $verbal[0], 'reading');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $reading
            )
        );

        echo json_encode($output);
    }

    // 获取三个题的阅读题
    private function getVerbalThird () {
        $type = $_GET['type'];

        $verbal = $this->reasoningservice->getVerbalThirdByType($type);

        $verbal[0]['index'] = 18;
        $verbal[0]['start'] = 18;
        $verbal[0]['to'] = 20;
        $verbal[0]['qtype'] = $verbal[0]['q1type'];
        $verbal[0]['question'] = $verbal[0]['question1'];
        $verbal[0]['choices'] = $this->stringToArray($verbal[0]['choices1']);
        $verbal[0]['choices2'] = $this->stringToArray($verbal[0]['choices2']);
        $verbal[0]['choices3'] = $this->stringToArray($verbal[0]['choices3']);

        $reading = $this->getModuleHtml('verbal_reading', $verbal[0], 'reading');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $reading
            )
        );

        echo json_encode($output);
    }

    // quantity的比较题部分
    private function getQuantityCompare () {
        $types = array("easy", "medium", "hard");
        $type = $types[rand(0, 2)];
        $count = 8;
        $quantities = $this->reasoningservice->getQuantityQSByNumber($type, $count);

        $quantitiesArray = array();
        for ($i = 0; $i < $count; $i++) {
            $quantities[$i]['index'] = $i + 1;
            $quantityHtml = $this->getModuleHtml('quantity_compare', $quantities[$i], 'quantity');
            $quantitiesArray[$i] = $quantityHtml;
        }

        // 使用head_tip.html中提供的default值
        $headTip = $this->getModuleHtml('head_tip', array(array('total' => 20), array('time' => '00 : 35 : 00')), array('question', 'section'));

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $quantitiesArray,
                "headTip" => $headTip
            )
        );

        echo json_encode($output);
    }

    // 数理推理部分的帮助文档
    private function quantityHelp () {
        $help = array(
            'tabList' => array(
                array('name' => 'Section Directions'),
                array('name' => 'General Directions'),
                array('name' => 'Testing Tools'),
                array('name' => 'Calculator Usage')
            )
        );

        $tabHtml = $this->getModuleHtml('tab', $help, 'help');
        $gdHtml = $this->getWidgetHtml('section_gd');
        $ttHtml = $this->getWidgetHtml('quantity_tt');
        $calHtml = $this->getWidgetHtml('quantity_cal');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "tabHtml" => $tabHtml,
                "gdHtml" => $gdHtml,
                "ttHtml" => $ttHtml,
                "calHtml" => $calHtml
            )
        );

        echo json_encode($output);
    }

    // 数理推理选择题
    private function getQuantitySelect () {
        $type = $_GET['type'];
        $count = 8;
        $quantities = $this->reasoningservice->getQuantitySelectByNumber($type, $count);
        $quantitiesArray = array();
        for ($i = 0; $i < $count; $i++) {
            $quantities[$i]['index'] = $i + 9;
            $quantities[$i]['choices'] = $this->stringToArray($quantities[$i]['choices']);
            $quantityHtml = $this->getModuleHtml('quantity_select', $quantities[$i], 'quantity');
            $quantitiesArray[$i] = $quantityHtml;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $quantitiesArray
            )
        );

        echo json_encode($output);
    }

    // 数理推理输入题
    private function getQuantityInput () {
        $type = $_GET['type'];
        $count = 4;
        $quantities = $this->reasoningservice->getQuantityInputByNumber($type, $count);
        $quantitiesArray = array();
        for ($i = 0; $i < $count; $i++) {
            $quantities[$i]['index'] = $i + 17;
            $quantityHtml = $this->getModuleHtml('quantity_input', $quantities[$i], 'quantity');
            $quantitiesArray[$i] = $quantityHtml;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "type" => $type,
                "questions" => $quantitiesArray
            )
        );

        echo json_encode($output);
    }

    private function isUserNameUsed () {
        $name = $_GET['name'];
        // 初始化不存在
        $isExist = 0;
	    $data = $this->userservice->isUserNameExist($name);
	    if ($data) {
	        $isExist = 1;
        }
        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $isExist
        );

        echo json_encode($output);
    }

    private function register () {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $code = $_POST['code'];
        $token = $_POST['token'];

        if (null == $token || $token != $_SESSION['token']) {
            unset($_SESSION['token']);
            exit;
        }

        // 销毁token
        $usernameLength = strlen(mb_convert_encoding($username, "gb2312", "utf-8"));
        $passwordLength = strlen(mb_convert_encoding($password, "gb2312", "utf-8"));

        $isEmail = 1;
        $isUserName = 1;
        $isPassword = 1;
        $isConfirm = 1;
        $isCode = 1;
        if (!$this->isEmail($email)) {
            $isEmail = 0;
        }
        if (is_numeric($username) || $usernameLength > 14 || preg_match("/[^0-9a-zA-Z_\x{4e00}-\x{9fa5}]+/u", $username) === 1) {
            $isUserName = 0;
        }
        if ($passwordLength < 6 || $passwordLength > 14) {
            $isPassword = 0;
        }
        if ($password !== $confirm) {
            $isConfirm = 0;
        }
        if ($code !== $_SESSION['code']) {
            $isCode = 0;
        }

        // 全部合法，写入数据库
        if ($isEmail === 1 && $isUserName === 1 &&
            $isPassword === 1 && $isConfirm === 1 && $isCode === 1) {
            $isUserName = $this->userservice->insertUser($email, $username, $password);
            unset($_SESSION['token']);
            setcookie("secureid", md5($username. $password), time() + 3600 * 24 * 14, '/', '.igrer.com');
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "email" => $isEmail,
                "userName" => $isUserName,
                "passsword" => $isPassword,
                "confirm" => $isConfirm,
                "code" => $isCode
            )
        );

        echo json_encode($output);
    }

    // 登录
    private function login () {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass = $_POST['pass'];
        $isLogin = true;

        $info = $this->userservice->isUserExist($username, $password);
        if ($info === false) {
            // 登录失败
            $isLogin = false;
        } else {
            // 登录成功
            $_SESSION['userInfo'] = $info[0];
            if ($pass === 'true') {
                setcookie("secureid", md5($username. $password), time() + 3600 * 24 * 14, '/', '.igrer.com');
            }
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $isLogin
        );
        echo json_encode($output);
    }

    // 退出
    private function logout () {
        $url = $_GET['url'];

        unset($_SESSION['userInfo']);
        setcookie("secureid", '', time() - 3600, '/', '.igrer.com');

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $url
        );
        echo json_encode($output);
    }

    private function isLogin () {
        $isLogin = true;
        if (empty($_SESSION['userInfo'])) {
            $isLogin = false;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => array (
                "isLogin" => $isLogin
            )
        );

        echo json_encode($output);
    }

    private function saveReasoning () {
        $type = $_POST['type'];
        $data = json_decode($_POST['data']);
        $status = 0;    // 状态，0表示保存成功，1表示保存失败
        $iterate = 0;

        foreach ($data as $item) {
            if ($iterate == 0) {
                $startqid = $item->qid;
            }
            $qid .= $item->qid . '/';
            $useranswer .= $item->useranswer . '/';
            $iterate++;
        }
        if ($iterate !== 20) {
            $status = 2;
        } else {
            $status = $this->userservice->insertUCReasoning($qid, $startqid, $useranswer, $type) ? 0 : 1;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $status
        );

        echo json_encode($output);
    }

    private function saveArticle () {
        $id = $_POST['id'];
        $article = strip_tags($_POST['article']);
        $type = $_POST['type'];

        $length = strlen($article);
        $status = 0;    // 状态，0表示保存成功，1表示保存失败，2表示文章内容太短，不允许保存

        if ($length < 100) {
            $status = 2;
        }

        // issue数据
        if ($type === 'issue') {
            $status = $this->userservice->insertUCWriting($id, $article, 'issue') ? 0 : 1;
        } else {
            $status = $this->userservice->insertUCWriting($id, $article, 'argument') ? 0 : 1;
        }

        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $status
        );

        echo json_encode($output);
    }

    /**
     * 获得个人历史数据
     */
    private function getLogList () {
        $type = $_GET['type'];
        $start = $_GET['start'];

        if ($type === 'argument') {
            $list = $this->userservice->getUCArgumentByCount($start, 20);
            $tab = array(
                'type' => 'argument',
                'list' => $list
            );
        } elseif ($type === 'verbal') {
            $list = $this->userservice->getUCVerbalByCount($start, 20);
            $tab = array(
                'type' => 'verbal',
                'list' => $list
            );
        } elseif ($type === 'quantity') {
            $list = $this->userservice->getUCQuantityByCount($start, 20);
            $tab = array(
                'type' => 'quantity',
                'list' => $list
            );
        }

        $content = $this->getModuleHtml('uc_tab_item', $tab, 'tab');
        $output = array (
            "status" => array (
                "code" => 0
            ),
            "content" => $content
        );

        echo json_encode($output);
    }

    public function execute ($context) {

        $this->type = $context[1];

        switch ($this->type) {
            case 'writing/help':
                $this->writingHelp();
                break;
            case 'writing/getIssue':
                $this->getIssue();
                break;
            case 'writing/getArgument':
                $this->getArgument();
                break;
            case 'writing/save':
                $this->saveArticle();
                break;
            case 'reasoning/save':
                $this->saveReasoning();
                break;
            case 'section/nextTip':
                $this->nextTip();
                break;
            case 'verbal/help':
                $this->verbalHelp();
                break;
            case 'verbal/pt1':
                $this->getVerbalSC();
                break;
            case 'verbal/pt2':
                $this->getVerbalLogic();
                break;
            case 'verbal/pt3':
                $this->getVerbalForth();
                break;
            case 'verbal/pt4':
                $this->getVerbalMC();
                break;
            case 'verbal/pt5':
                $this->getVerbalTwice();
                break;
            case 'verbal/pt6':
                $this->getVerbalThird();
                break;
            case 'quantity/pt1':
                $this->getQuantityCompare();
                break;
            case 'quantity/pt2':
                $this->getQuantitySelect();
                break;
            case 'quantity/pt3':
                $this->getQuantityInput();
                break;
            case 'quantity/help':
                $this->quantityHelp();
                break;
            case 'account/nameUsed':
                $this->isUserNameUsed();
                break;
            case 'account/login':
                $this->login();
                break;
            case 'account/logout':
                $this->logout();
                break;
            case 'account/register':
                $this->register();
                break;
            case 'account/isLogin':
                $this->isLogin();
                break;
            case 'uc/getLogList':
                $this->getLogList();
                break;
            default:
                echo '{"status": {"code": 404}}';
                break;
        }
    }
}
