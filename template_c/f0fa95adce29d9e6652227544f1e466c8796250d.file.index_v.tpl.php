<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:07:34
         compiled from "/var/grer/template/web/index_v.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23837336552fcc39638b737-26810367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0fa95adce29d9e6652227544f1e466c8796250d' => 
    array (
      0 => '/var/grer/template/web/index_v.tpl',
      1 => 1371479562,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '23837336552fcc39638b737-26810367',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_module')) include '/var/grer/template/lib/plugins/block.module.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) - 文字推理</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="Verbal Reasoning(文字推理)测试考查考生的多方面能力，包括分析和评估文字材料，整合从文字材料中获得的信息，分析句子成分之间的关系，以及识别单词和概念之间的关系。" />
        <!--[if lt IE 9]><script src="/static/js/html5.js"></script><![endif]-->
        
        <link href="/static/css/common.css-min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/static/js/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="/static/js/common.js-min.js"></script>
        
    </head>
    <body class="page">
        <div class="top-bar">
            <div class="inner">
                <ul class="top-bar-menu">
                    <li class="links">
                        <?php if ($_smarty_tpl->getVariable('userInfo')->value['isLogin']){?><a href="/home/uc" title="<?php echo $_smarty_tpl->getVariable('userInfo')->value['userName'];?>
"><?php echo $_smarty_tpl->getVariable('userInfo')->value['userName'];?>
</a><a href="/" id="J_logout" title="退出">退出</a><?php }else{ ?><a title="登录" href="/" id="J_login">登录</a><a href="/account/apply" target="_blank">注册</a><?php }?><a class="add-fav" id="J_add-fav" href="#">收藏</a>
                    </li>
                    <li class="J_hover">
                        <div class="qqgroup">
                            <p class="hd">QQ群号：<!--<a target="_blank" href="http://qun.qq.com/#jointhegroup/gid/29557399">-->29557399<!--</a>--></p>
                            <!--<p class="bd"><a target="_blank" href="http://qun.qq.com/#jointhegroup/gid/"></a></p>-->
                        </div>
                    </li>
                    <li>
                        <div class="weibo-follow">
                            <a title="新浪微博" class="follow-third-i follow-third-tsina" href="http://www.weibo.com/u/2784476625" target="_blank" rel="nofollow">新浪微博</a>
                            <a title="腾讯微博" class="follow-third-i follow-third-tqq" href="http://t.qq.com/igrer_com" target="_blank" rel="nofollow">腾讯微博</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
        (function () {
            GRE.login.init({ trigger: $('#J_login') });
            GRE.favorite.init();
            $('#J_logout').click(function () {
                GRE.get('/ajax/account/logout', {}, function (data) {
                    location.reload(true);
                });
                return false;
            });
        })();
        </script>
        
        <header id="header">
            <a href="/" title="爱GRE模考网" class="logo"></a>
            <nav class="nav-channel">
                <ul class="nav-channel-list">
                    <li><a href="/" title="分析性写作" alt="分析性写作">分析性写作</a></li>
                    <li class="nav-active"><a href="/home/verbal" title="文字推理" alt="文字推理">文字推理</a></li>
                    <li><a href="/home/quantity" title="数量推理" alt="数量推理">数量推理</a></li>
                    <li><a href="/home/pool" title="题目讨论" alt="数量推理">题目讨论</a></li>
                    <li><a href="/home/uc" title="个人中心" rel="nofollow">个人中心</a></li>
                    <li><a href="/home/help" title="关于我们" rel="nofollow">关于我们</a></li>
                </ul>
            </nav>
        </header>
        <section id="container"><div class="layout"><div class="col-main"><div class="main-wrap" id="J_main-wrap">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('module', array('name'=>"rect_block",'class'=>"enter-verbal",'title'=>"Verbal Reasoning")); $_block_repeat=true; smarty_block_module(array('name'=>"rect_block",'class'=>"enter-verbal",'title'=>"Verbal Reasoning"), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

    <div class="intro">考场提醒：进入考场前请确保您有30分钟时间完成该部分题目的作答。</div>
    <a href="/modeltest/verbal" title="文字推理考场" alt="文字推理考场" class="enter-btn">点击进入此考场</a>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_module(array('name'=>"rect_block",'class'=>"enter-verbal",'title'=>"Verbal Reasoning"), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('module', array('name'=>"mod_block",'class'=>"overview",'title'=>"文字推理概述")); $_block_repeat=true; smarty_block_module(array('name'=>"mod_block",'class'=>"overview",'title'=>"文字推理概述"), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

    <p><strong>Verbal Reasoning(文字推理)测试考查考生的多方面能力，包括分析和评估文字材料，整合从文字材料中获得的信息，分析句子成分之间的关系，以及识别单词和概念之间的关系。</strong></p>
    <p>Verbal Reasoning测试会以集中不同形式出现，下文讲逐一进行详细讲解。大约一半的题目要求考生阅读一段或几段文字，然后回答与所阅读段落相关的问题。另一半题目要求考生阅读、理解并完成给出的句子、句群或段落。很多题目(但并非全部)是标准的多项选择题，要求选出一个正确选项；另有一些题目要求选出多个正确选项；还有一些题目则要求考生从段落中选出一个句子。选型的数量因题型而异。</p>
    <p>Verbal Reasoning测试包含三种题型：</p>
    <p><ul>
        <li>Reading Comprehension(阅读理解)</li>
        <li>Text Completion(段落完形填空)</li>
        <li>Sentence Equivalence(同义句问题)</li>
    </ul></p>
    <p>更多关于Verbal Reasoning测试内容信息，请访问网址：<a href="http://www.ets.org/gre/revised/prepare" target="_blank">www.ets.org/gre/revised/prepare</a>。</p>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_module(array('name'=>"mod_block",'class'=>"overview",'title'=>"文字推理概述"), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div></div></div></section>
        <footer id="footer">
            <p class="footer-nav">
                <a href="/home/help" rel="nofollow">关于我们</a>
                |
                <a href="/home/help#cooperation" rel="nofollow">商务合作</a>
                |
                <a href="/home/help#links" rel="nofollow">友情链接</a>
                |
                <a href="/home/help#announce" rel="nofollow">免责声明</a>
            </p>
            <p class="copyright">
                &copy;Copyright igrer.com <?php echo smarty_modifier_date_format(time(),"%Y");?>
. All rights reserved
            </p>
        </footer>
		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
