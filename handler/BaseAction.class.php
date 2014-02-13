<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-3-31
 * Time: 下午2:30
 * BaseAction, 其它的handler继承自该类
 */

class BaseAction {

    //渲染模板相关
    protected $tplParam;
    protected $smarty;
    protected $tplName;

    //登录相关
    protected $arrUser;
    protected $intUid;

    protected $userservice;

    //构造函数
    public function __construct() {
        $this->userservice = new UserService();

        $this->tplParam = array();
        $this->smarty = null;
        $this->tplName = '';

        $this->arrUser = array();
        $this->intUid = false;

        $this->initSmarty();
    }

    //检查用户登录情况
    public function checkUserLogin () {
        if (isset($_COOKIE['secureid'])) {
            $secureid = $_COOKIE['secureid'];
            $info = $this->userservice->isUserExistByUid($secureid);
            if ($info === false) {
                // 登录失败
                $this->arrUser['isLogin'] = false;
            } else {
                // 登录成功
                $_SESSION['userInfo'] = $info[0];
                $this->arrUser['isLogin'] = true;
                $this->arrUser['userName'] = $info[0]['username'];
            }
        } else {
            $session = $_SESSION['userInfo'];
            if (empty($session)) {
                $this->arrUser['isLogin'] = false;
            } else {
                $this->arrUser['isLogin'] = true;
                $this->arrUser['userName'] = $session['username'];
            }
        }
    }

    //初始化模板
    protected function initSmarty() {

        if($this->smarty != null) {
            return;
        }

        require_once (SMARTY_PATH . 'Smarty.class.php');

        $this->smarty = new Smarty();
        $this->smarty->template_dir = TEMPLATE_PATH;
	if (!is_dir(TEMPLATE_C_PATH)) mkdir(TEMPLATE_C_PATH);
        $this->smarty->compile_dir = TEMPLATE_C_PATH;
        $this->smarty->config_dir = SMARTY_CONFIG_PATH;
        $this->smarty->plugins_dir = array(TEMPLATE_PATH.'smarty_plugins', SMARTY_PLUGINS_DIR, TEMPLATE_PATH.'lib/plugins');
        $this->smarty->module_dir = SMARTY_TEMPLATE_MODULE_PATH;
        $this->smarty->cache_dir = TEMPLATE_C_PATH;
        $this->smarty->left_delimiter = "{";
        $this->smarty->right_delimiter = "}";

        $this->smarty->compile_locking = false;       // 防止调用touch,saemc会自动更新时间，不需要touch
        $this->smarty->debugging = false;             // 线下开发时debug设置为true，上线时改为false
        $this->smarty->caching = false;               // 线下开发时cache设置为false, 上线时改为true
        $this->smarty->cache_lifetime = 120;
    }

    //渲染模板
    protected function render() {
        foreach ($this->tplParam as $key => $value) {
            $this->smarty->assign($key,$value);
        }
        @$this->smarty->display($this->tplName);
    }

    //设置模板参数
    protected function setTplParam($key, $value) {
        $this->tplParam[$key] = $value;
    }

    //设置模板名称
    protected function setTplName($strTplName) {
        $this->tplName = $strTplName;
    }

    /**
     * @param $name                     module的文件名
     * @param {String|Array} $data      确保$data和$alias保持对应
     * @param {string|Array} $alias
     * @return html
     */
    protected function getModuleHtml($name, $data='', $alias='') {
        // 模块的存储文件
        $module_file = $this->smarty->module_dir. $name. '.html';
        if (file_exists($module_file)) {
            if ($data == '' || $alias == '') {
            } else {
                if (is_array($data) && is_array($alias) && count($data) == count($alias)) {
                    for ($i = 0; $i < count($data); $i++) {
                        $this->smarty->assign($alias[$i], $data[$i]);
                    }
                } else {
                    $this->smarty->assign($alias, $data);
                }
            }
            return @$this->smarty->fetch($module_file);
        }
        $module_file = null;
    }

    // 获取widget的html
    protected function getWidgetHtml($name) {
        // widget的存储文件
        $widget_file = WIDGET_PATH. $name. '.html';
        if (file_exists($widget_file)) {
            return @$this->smarty->fetch($widget_file);
        }
        $widget_file = null;
    }

    /**
     * @param $string  字符串
     * @return Array   数组
     */
    public function stringToArray($string) {
        preg_match_all('/\[\"([^\]]*)\"\]/i', $string, $matches, PREG_OFFSET_CAPTURE);
        $array = array();
        for ($i = 0; $i < count($matches[1]); $i++) {
            $arr = explode('",', $matches[1][$i][0]);
            for ($j = 0; $j < count($arr); $j++) {
                $arr[$j] = str_replace('"', '', trim($arr[$j]));
            }
            $array[$i] = $arr;
        }
        return $array;
    }

    /**
     * 判断是否是email地址
     * @param $email
     * @return bool
     */
    public function isEmail ($email) {
        if (preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,4}$/", $email)) {
            return true;
        }
        return false;
    }

    /**
     * 随机生成一个8位的token input标签
     * @return string
     */
    public function genInput () {
        $hash = md5(uniqid(rand(), true));
        $n = rand(1, 24);
        $token = substr($hash, $n, 8);
        $_SESSION['token'] = $token;
        return '<input type="hidden" name="token" value="'. $_SESSION['token']. '" />';
    }

}
