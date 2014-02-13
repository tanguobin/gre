<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:09:32
         compiled from "/var/grer/template/web/index_help.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213002909252fcc40c77f404-69269808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4eb2ff709a62f72629651b655820590ea981c8' => 
    array (
      0 => '/var/grer/template/web/index_help.tpl',
      1 => 1392274717,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '213002909252fcc40c77f404-69269808',
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
        <title>爱GRE模考网(igrer.com)  - 关于我们</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="互联网上唯一的全真新GRE模考网站。在这里，您不仅能体验到最真实的新GRE机考界面，也可以认识更多一起奋斗的G友，助你轻松搞定新GRE。" />
        <meta name="robots" content="noindex, nofollow" />
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
                    <li><a href="/home/uc" title="个人中心" rel="nofollow">个人中心</a></li>
                    <li class="nav-active"><a href="/home/help" title="关于我们" rel="nofollow">关于我们</a></li>
                </ul>
            </nav>
        </header>
        <section id="container">
<div class="layout grid-s190m0">
    <div class="col-main">
        <div class="main-wrap help" id="J_help-section">
            <section class="about-us">
                <p>爱GRE模考网(<a href="http://www.igrer.com/">www.igrer.com</a>)的宗旨是“帮G友们轻松搞定新G”。</p>
                <p>爱GRE模考网采用智能化搜索引擎，从互联网抓取各类题目，通过人工刷选入库，保证题目的质量。</p>
                <p>G友们来到这不仅能够通过在线模考提供个人的应试能力，而且可以结识更多的朋友，共同提高进步。</p>
                <p>有了爱GRE模考网，非计算机专业的同学不再需要安装坑爹的POWERPREP II软件了(需要安装java虚拟机)。</p>
                <p>除此之外，我们还将定期邀请GRE名师给各位童鞋讲解新GRE的应试技巧。</p>
                <p>总之，出于帮助饱受新GRE折磨的童鞋以最快捷，最轻松的方式搞定新G，我们建立了爱GRE模考网。</p>
            </section>
            <section class="cooperation hide">
                <ul>
                    <li>联系人：谭先生</li>
                    <li>Email：gbtan1988@gmail.com</li>
                    <li>QQ：445855631</li>
                </ul>
            </section>
            <section class="links hide">
                <h2>友情链接</h2>
                <ul class="site-link-list">
                    <li><a href="http://www.ets.org/">ETS官网</a></li>
                    <li><a href="http://www.taisha.org/">太傻网</a></li>
                    <li><a href="http://gter.ce.cn/">寄托天下</a></li>
                    <li><a href="http://www.etest.net.cn/">教育部考试中心海外考试报名信息网</a></li>
                    <li><a href="http://www.gmajor.net/awp/">AWP官方主页</a></li>
                    <li><a href="http://www.nytimes.com/">The New York Times</a></li>
                    <li><a href="http://www.washingtonpost.com/">Washington Post</a></li>
                    <li><a href="http://online.wsj.com/">The Wall Street Journal</a></li>
                </ul>
            </section>
            <section class="announce hide">
                <p class="noindent">在接受爱GRE模考网服务之前，请您务必仔细阅读并透彻理解本声明。<br>无论您采取何种方式登陆或使用爱GRE模考网的服务和数据，都将视作您对本声明全部内容的认可。</p>
                <b>第一部分</b>
                <p>鉴于爱GRE模考网的所有题目素材全部来源于互联网或由网友提供，本站不做任何形式的保证：不保证题目及题目答案的准确性，不保证题目素材来源的合法性。因使用爱GRE模考网而可能遭致的意外、疏忽、侵权及其造成的损失，本站对其概不负责，亦不承担任何法律责任。</p>
                <b>第二部分</b>
                <p>爱GRE模考网仅为用户发布的内容提供存储空间，爱GRE模考网不对用户发表、转载的内容提供任何形式的保证：不保证内容满足您的要求，用户在爱GRE模考网发表的内容仅表明其个人的立场和观点，并不代表爱GRE模考网的立场或观点。</p>
                <p>作为题目素材的提供者，需自行对所提供的题目素材负责，因所提供的题目素材引发的一切纠纷，由该题目素材的提供者承担全部法律及连带责任。爱GRE模考网不承担任何法律及连带责任。</p>
                <p>用户在爱GRE模考网发布侵犯他人知识产权或其他合法权益的内容，爱GRE模考网有权予以删除，并保留移交司法机关处理的权利。</p>
                <p>个人或单位如认为爱GRE模考网上存在侵犯自身合法权益的内容，应准备好具有法律效应的证明材料，及时与爱GRE模考网取得联系，以便爱GRE模考网迅速做出处理。</p>
                <p>对免责声明的解释、修改及更新权均属于爱GRE模考网所有。</p>
                <p>联系方式：<a href="mailto:gbtan1988@gmail.com">gbtan1988@gmail.com</a></p>
            </section>
        </div>
    </div>
    <div class="col-sub">
        <ul class="help-nav cf" id="J_help-nav">
            <li class="current"><a title="关于我们" href="#aboutus">关于我们</a></li>
            <li><a title="商务合作" href="#cooperation">商务合作</a></li>
            <li><a title="友情链接" href="#links">友情链接</a></li>
            <li><a title="免责声明" href="#announce">免责声明</a></li>
        </ul>
    </div>
</section>
        
<script type="text/javascript">
(function () {
    var helpSections = $('#J_help-section').children(),
        nav = $('#J_help-nav'),
        hashes = ['#aboutus', '#cooperation', '#links', '#announce'];
    $.each($('#J_help-nav li'), function (idx, ele) {
        $(ele).click(function (evt) {
            $(ele).siblings().removeClass('current');
            $(ele).addClass('current');
            helpSections.hide().eq(idx).show();
            location.hash = hashes[idx];
            return false;
        });
    });
    switch(location.hash) {
        case hashes[0]:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
            break;
        case hashes[1]:
            helpSections.hide().eq(1).show();
            nav.children().removeClass('current').eq(1).addClass('current');
            break;
        case hashes[2]:
            helpSections.hide().eq(2).show();
            nav.children().removeClass('current').eq(2).addClass('current');
            break;
        case hashes[3]:
            helpSections.hide().eq(3).show();
            nav.children().removeClass('current').eq(3).addClass('current');
            break;
        default:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
    }
}) ();
</script>

		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
