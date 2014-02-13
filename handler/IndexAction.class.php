<?php
/**
 * Created by gbtan.
 * User: tanguobin
 * Date: 2012-4-1
 * Time: 上午10:13
 * 首页Action类
 */

class IndexAction extends BaseAction {

	// 构造函数
	public function __construct() {
		BaseAction::__construct();
	}

	public function execute ($context) {
        $this->checkUserLogin();
        $this->setTplParam('userInfo', $this->arrUser);
        $this->setTplName('web/index.tpl');

		$this->render();
	}
}