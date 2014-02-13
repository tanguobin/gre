<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-3-31
 * Time: 下午3:19
 * 系统路由入口
 */

define('ROOT_PATH', dirname(__FILE__) . '/');
define('MODEL_PATH', ROOT_PATH . 'model/');
define('SERVICE_PATH', ROOT_PATH . 'service/');
define('HANDLER_PATH', ROOT_PATH . 'handler/');
define('SMARTY_PATH', ROOT_PATH . 'framework/lib/smarty/libs/');
define('TEMPLATE_PATH', ROOT_PATH . 'template/');
define('TEMPLATE_C_PATH', ROOT_PATH . 'template_c/');
define('SMARTY_TEMPLATE_MODULE_PATH', TEMPLATE_PATH. 'lib/modules/');
define('SMARTY_PLUGINS_DIR', SMARTY_PATH . 'plugins/');
define('SMARTY_CONFIG_PATH', TEMPLATE_PATH . 'config/');
define('WIDGET_PATH', TEMPLATE_PATH. 'lib/widget/');

// redirect url
$redirect_url = $_SERVER['REQUEST_URI'];
$pos = strpos($_SERVER['REQUEST_URI'], '?');
if ($pos > 0) {
	$redirect_url = substr($_SERVER['REQUEST_URI'], 0, $pos);
}

// action的url映射规则
$action_config = array (
    '/^\/modeltest(\/(.*))/' => array (
        'name' => 'ModelAction',                                // 模考
        'path' => HANDLER_PATH . 'ModelAction.class.php'
    ),
    '/^\/home\/(.*)/' => array (
    	'name' => 'HomeAction',
   		'path' => HANDLER_PATH . 'HomeAction.class.php'
    ),
    '/^\/ajax\/(.*)/' => array (
	    'name' => 'AjaxAction',                                 // ajax请求入口
	    'path' => HANDLER_PATH . 'AjaxAction.class.php'
    ),
    '/^\/account\/(.*)/' => array (
        'name' => 'AccountAction',
        'path' => HANDLER_PATH . 'AccountAction.class.php'       // 账号管理
    ),
    '/^\/view\/((issue|argument|verbal|quantity)+(\/[0-9]+)?(\/[0-9]+)?(\/[0-9]+)?)/' => array (
        'name' => 'ViewAction',
        'path' => HANDLER_PATH . 'ViewAction.class.php'          // 历史数据
    ),
    '/^\/(issue|argument|vsingle|vmult|vlogic|vreading|qcompare|qselect|qinput)(\/([0-9]+))?/' => array (
        'name' => 'PoolAction',
        'path' => HANDLER_PATH . 'PoolAction.class.php'         // 题集
    ),
    '/^\/?$/' => array (
	    'name' => 'IndexAction',                                 // 首页，分析性写作
	    'path' => HANDLER_PATH . 'IndexAction.class.php'
    )
);

// 跳转到404页面
function to404 () {
    require_once(ROOT_PATH . '/static/html/40x.html');
    header("HTTP/1.1 404 Not Found");
    header("Status: 404 Not Found");
    exit;
}

// 进行路由转发
$hasMatched = false;
session_start();
foreach ($action_config as $key => $value) {
    if (preg_match($key, $redirect_url, $matches)) {
        // 导入BaseAction和url对应的php类文件
        include_by_path(HANDLER_PATH . 'BaseAction.class.php');
        // 导入依赖包
	    include_by_path(MODEL_PATH);
        include_by_path(SERVICE_PATH);
	    // 导入url映射的action类
	    include_by_path($value['path']);
        $ins = new $value['name']();
        $ins->execute($matches);
	    $hasMatched = true;
        break;
    }
}
// 没有匹配到相应的action，路由到404页面
if ($hasMatched == false) {
    to404();
}

/**
 * 根据路径导入php文件
 * @name include_by_path
 * @function
 * @param   {string}   path   目录名
 */
function include_by_path ($path) {
    if (is_dir($path)) {
        if ($dh = opendir($path)) {
            while (false !== ($file = readdir($dh))) {
                if (file_exists($path. $file)) {
                    if (get_file_extend($file) == 'php') {
                        require_once($path . $file);
                    }
                } else {
                    echo "read from dir, $file is not exist!!!";
                }
            }
            closedir($dh);
        }
    } else {
        if (file_exists($path)) {
            require_once($path);
        } else {
            echo "read from file, $path is not exist!!!";
        }
    }
}
/**
 * 获得文件的后缀名
 * @name get_file_extend
 * @function
 * @param   {string}   file_name   文件名
 *
 * @returns {string}   extend   后缀名
 */
function get_file_extend ($file_name) {
    $extend = pathinfo($file_name);
    $extend = strtolower($extend["extension"]);
    return $extend;
}
