<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:34:49
         compiled from "/var/grer/template/web/pool_reason.tpl" */ ?>
<?php /*%%SmartyHeaderCode:204187128252fcc9f97aad24-97074131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15e86a272b71fb3e83916b614e313dccaf5dfdfd' => 
    array (
      0 => '/var/grer/template/web/pool_reason.tpl',
      1 => 1371479562,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '204187128252fcc9f97aad24-97074131',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_strip_tags')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.strip_tags.php';
if (!is_callable('smarty_modifier_escape')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) - <?php if ($_smarty_tpl->getVariable('verbal')->value){?><?php echo smarty_modifier_strip_tags($_smarty_tpl->getVariable('verbal')->value['question']);?>
<?php }else{ ?><?php echo smarty_modifier_strip_tags($_smarty_tpl->getVariable('quantity')->value['question']);?>
<?php }?></title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="<?php if ($_smarty_tpl->getVariable('verbal')->value){?><?php echo smarty_modifier_escape(smarty_modifier_strip_tags($_smarty_tpl->getVariable('verbal')->value['question']));?>
<?php }else{ ?><?php echo smarty_modifier_escape(smarty_modifier_strip_tags($_smarty_tpl->getVariable('quantity')->value['question']));?>
<?php }?>" />
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
                    <li><a href="/home/verbal" title="文字推理" alt="文字推理">文字推理</a></li>
                    <li><a href="/home/quantity" title="数量推理" alt="数量推理">数量推理</a></li>
                    <li class="nav-active"><a href="/home/pool" title="题目讨论" alt="数量推理">题目讨论</a></li>
                    <li><a href="/home/uc" title="个人中心" rel="nofollow">个人中心</a></li>
                    <li><a href="/home/help" title="关于我们" rel="nofollow">关于我们</a></li>
                </ul>
            </nav>
        </header>
        <section id="container"><div class="layout"><div class="col-main"><div class="main-wrap" id="J_main-wrap">
<?php if ($_smarty_tpl->getVariable('verbal')->value){?>
    <?php if ($_smarty_tpl->getVariable('verbal')->value['action']=='vsingle'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_verbal_single.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }elseif($_smarty_tpl->getVariable('verbal')->value['action']=='vmult'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_verbal_multiple.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }elseif($_smarty_tpl->getVariable('verbal')->value['action']=='vlogic'||$_smarty_tpl->getVariable('verbal')->value['action']=='vreading'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_verbal_reading.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }?>
    <script type="text/javascript">
    var uyan_config = {
        'title':'<?php echo $_smarty_tpl->getVariable('verbal')->value['question'];?>
',
        'pic':'http://www.igrer.com/static/img/logo.png'
    };
    </script>
<?php }else{ ?>
    <?php if ($_smarty_tpl->getVariable('quantity')->value['action']=='qcompare'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_quantity_compare.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }elseif($_smarty_tpl->getVariable('quantity')->value['action']=='qselect'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_quantity_select.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }elseif($_smarty_tpl->getVariable('quantity')->value['action']=='qinput'){?>
        <?php $_template = new Smarty_Internal_Template("web/depends/inc_quantity_input.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    <?php }?>
    <script type="text/javascript">
    var uyan_config = {
        'title':'<?php echo $_smarty_tpl->getVariable('quantity')->value['question'];?>
',
        'pic':'http://www.igrer.com/static/img/logo.png'
    };
    </script>
<?php }?>
<div id="uyan_frame"></div>
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
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1643114" async=""></script>
<?php }?>

		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
