<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:07:53
         compiled from "/var/grer/template/web/index_uc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91526636552fcc3a9775496-28236614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04080663c6c26db7ab1ffb1b9a7d8de99c449624' => 
    array (
      0 => '/var/grer/template/web/index_uc.tpl',
      1 => 1371479562,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '91526636552fcc3a9775496-28236614',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_default')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.default.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) - 个人中心</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="互联网上唯一的全真新GRE模考网站。在这里，您不仅能体验到最真实的新GRE机考界面，也可以认识更多一起奋斗的G友，助你轻松搞定新GRE。" />
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
                    <li><a href="/home/pool" title="题目讨论" alt="数量推理">题目讨论</a></li>
                    <li class="nav-active"><a href="/home/uc" title="个人中心" rel="nofollow">个人中心</a></li>
                    <li><a href="/home/help" title="关于我们" rel="nofollow">关于我们</a></li>
                </ul>
            </nav>
        </header>
        <section id="container"><div class="layout"><div class="col-main"><div class="main-wrap" id="J_main-wrap">
<?php if ($_smarty_tpl->getVariable('userInfo')->value['isLogin']){?>
<div class="ucenter tabs">
    <div class="hd">
        <ul class="tab-control" id="J_tab-control">
            <li class="current ui-tab-first" rel="issue">Issue任务(<?php echo smarty_modifier_default($_smarty_tpl->getVariable('issue')->value['count'],0);?>
)</li>
            <li rel="argument">Argument任务(<?php echo smarty_modifier_default($_smarty_tpl->getVariable('argument')->value['count'],0);?>
)</li>
            <li rel="verbal">文字推理(<?php echo smarty_modifier_default($_smarty_tpl->getVariable('verbal')->value['count'],0);?>
)</li>
            <li rel="quantity">数理推理(<?php echo smarty_modifier_default($_smarty_tpl->getVariable('quantity')->value['count'],0);?>
)</li>
        </ul>
    </div>
    <div class="bd">
        <ul class="tab-content" id="J_tab-content">
            <li rel="issue" class="current">
                <?php if ($_smarty_tpl->getVariable('issue')->value['count']==0){?>
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过分析性写作(Issue任务)的试题</p></div>
                <?php }else{ ?>
                <?php $_template = new Smarty_Internal_Template("lib/modules/uc_tab_item.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
                <?php if ($_smarty_tpl->getVariable('issue')->value['count']>20){?>
                <a href="#" class="J_feed-more feed-more" data-start="20">查看更多</a>
                <?php }?>
                <?php }?>
            </li>
            <li rel="argument">
                <?php if ($_smarty_tpl->getVariable('argument')->value['count']==0){?>
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过分析性写作(Argument任务)的试题</p></div>
                <?php }?>
            </li>
            <li rel="verbal">
                <?php if ($_smarty_tpl->getVariable('verbal')->value['count']==0){?>
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过文字推理的试题</p></div>
                <?php }?>
            </li>
            <li rel="quantity">
                <?php if ($_smarty_tpl->getVariable('quantity')->value['count']==0){?>
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过数理推理的试题</p></div>
                <?php }?>
            </li>
        </ul>
    </div>
</div>
<?php }else{ ?>
<script type="text/javascript">
(function () {
    GRE.login.login();
}) ();
</script>
<?php }?>
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
<script type="text/javascript">
var pageData = {
    issueCount: <?php echo $_smarty_tpl->getVariable('issue')->value['count'];?>
,
    argumentCount: <?php echo $_smarty_tpl->getVariable('argument')->value['count'];?>
,
    verbalCount: <?php echo $_smarty_tpl->getVariable('verbal')->value['count'];?>
,
    quantityCount: <?php echo $_smarty_tpl->getVariable('quantity')->value['count'];?>

};
(function () {
    $('#J_tab-control').click(function (e) {
        var self = this,
            target = $(e.target),
            tabContent = $('#J_tab-content');
        if (target.hasClass('current')) {
            return;
        }
        if (target.is('li')) {
            var rel = target.attr('rel'),
                reli = tabContent.find('li[rel="' + rel + '"]'),
                dlength = reli.children().length,
                count = pageData[rel + 'Count'];
            $(self).children().removeClass('current');
            target.addClass('current');
            if (pageData[rel + 'Count'] != 0 && dlength == 0) {
                GRE.get('/ajax/uc/getLogList', { type: rel, start: 0 }, function (data) {
                    data = jQuery.parseJSON(data);
                    var html = data.content;
                    if (count > 20) {
                        html = [html, '<a href="#" class="J_feed-more feed-more" data-start="20">查看更多</a>'].join('');
                    }
                    reli.html(html);
                    tabContent.children().removeClass('current');
                    tabContent.find('li[rel="' + rel + '"]').addClass('current');
                });
            } else {
                tabContent.children().removeClass('current');
                tabContent.find('li[rel="' + rel + '"]').addClass('current');
            }
        }
    });
    $('#J_tab-content').click(function (e) {
        var self = this,
            target = $(e.target);
        if (target.hasClass('J_feed-more')) {
            var rel = target.parent().attr('rel'),
                start = parseInt(target.attr('data-start')),
                count = pageData[rel + 'Count'];
            GRE.get('/ajax/uc/getLogList', { type: rel, start: start }, function (data) {
                data = jQuery.parseJSON(data);
                var html = data.content;
                $(html).insertAfter(target.prev().removeClass('last'));
                if ((start + 20) > count) {
                    target.remove();
                } else {
                    target.attr('data-start', start + 20);
                }
            });
            return false;
        }
    });
})();
</script>

		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
