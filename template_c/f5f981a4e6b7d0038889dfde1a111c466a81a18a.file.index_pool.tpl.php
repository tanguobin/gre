<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:07:51
         compiled from "/var/grer/template/web/index_pool.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100563393152fcc3a7b29671-97943125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f981a4e6b7d0038889dfde1a111c466a81a18a' => 
    array (
      0 => '/var/grer/template/web/index_pool.tpl',
      1 => 1371479562,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '100563393152fcc3a7b29671-97943125',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) - 题库</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="爱GRE模考网为了方便各个考生对GRE某一类题型进行专项学习讨论，现对GRE全部题型分门别类，方便学习" />
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
    <div class="pool-list">
        <a href="/issue/1" title="Issue题集" alt="Issue题集" class="enter-btn">Issue题集</a>
        <a href="/argument/1" title="Argument题集" alt="Argument题集" class="enter-btn">Argument题集</a>
        <a href="/vsingle/1" title="文字推理单选题" alt="文字推理单选题" class="enter-btn">文字推理单选题</a>
        <a href="/vmult/1" title="文字推理多选题" alt="文字推理多选题" class="enter-btn">文字推理多选题</a>
        <a href="/vlogic/1" title="文字推理逻辑题" alt="文字推理逻辑题" class="enter-btn">文字推理逻辑题</a>
        <a href="/vreading/1" title="文字推理阅读题" alt="文字推理阅读题" class="enter-btn">文字推理阅读题</a>
        <a href="/qcompare/1" title="数量推理比较题" alt="数量推理比较题" class="enter-btn">数量推理比较题</a>
        <a href="/qselect/1" title="数量推理选择题" alt="数量推理选择题" class="enter-btn">数量推理选择题</a>
        <a href="/qinput/1" title="数量推理填空题" alt="数量推理填空题" class="enter-btn">数量推理填空题</a>
    </div>
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
