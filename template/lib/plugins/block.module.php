<?php

/*
 * params = array(
 * 	'title' => 'xxxxx',
 * 	'name' => 'abc'
 * )
 */

function smarty_block_module($params, $content, $smarty, &$repeat) {
    /*
      * tag 区分起始和结束，起始标签Content为null，不进行处理
      */
    if ($content !== null) {
        // 模块的存储文件
        $module_file = $smarty->module_dir.$params['name'].'.html';
        unset($params['name']);
        if (file_exists($module_file)) {
            // 创建一个smarty模板对象，进行模块存储文件的解析
            $tpl = null;
            $tpl = $smarty->createTemplate($module_file);
            // 循环检查params属性值是一个引用还是一个字符串
            foreach ($params as $key => $value) {
                if ($smarty->getGlobal($params[$key])) {
                    $tpl->assign($key,$smarty->getGlobal($params[$key]));
                    $smarty->assignGlobal($params[$key],null);
                } else {
                    $tpl->assign($key,$value);
                }
            }
            $tpl->assign('content',$content);
            $tpl->display();
        }
        $module_file = null;
    }
}

?>
