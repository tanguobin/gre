<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:09:54
         compiled from "/var/grer/template/web/desc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59315280552fcc422df7a18-38458586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd386255b0e6f7f9026bbc9e8f089a54ca2a26e5' => 
    array (
      0 => '/var/grer/template/web/desc.tpl',
      1 => 1371479562,
    ),
    '89c2a522428f29b03cda92df36e3695bb5645600' => 
    array (
      0 => '/var/grer/template/lib/framework/test_base_fw.html',
      1 => 1371520010,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '59315280552fcc422df7a18-38458586',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_default')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.default.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) <?php echo smarty_modifier_escape($_smarty_tpl->getVariable('title')->value);?>
 </title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="互联网上唯一的全真新GRE模考网站。在这里，您不仅能体验到最真实的新GRE机考界面，也可以认识更多一起奋斗的G友，助你轻松搞定新GRE。" />
        <meta name="robots" content="noindex, nofollow" />
        <!--[if lt IE 9]><script src="/static/js/html5.js"></script><![endif]-->
        
        <link href="/static/css/common.css-min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/static/js/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="/static/js/common.js-min.js"></script>
        
    </head>
    <body class="test-page">
        <header id="header">
<div class="hd cf">
    <a href="/" title="爱GRE在线模考" class="logo"></a>
    <div class="title">GRE&reg; Test Preview Tool Section <span id="J_csection-num"><?php echo smarty_modifier_default($_smarty_tpl->getVariable('section')->value['current'],1);?>
</span> of <span class="J_tsection-num"><?php echo smarty_modifier_default($_smarty_tpl->getVariable('section')->value['total'],1);?>
</span></div>
    <?php $_template = new Smarty_Internal_Template("web/depends/inc_operation.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div>
<div class="bd" id="J_header-bd"></div>

        </header>
        <section id="container"><div class="layout"><div class="col-main"><div class="main-wrap" id="J_main-wrap">
<?php $_template = new Smarty_Internal_Template("web/depends/".((smarty_modifier_escape($_smarty_tpl->getVariable('dependfn')->value,"url"))), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
</div></div></div></section>
        
<script type="text/javascript">
$(document).ready(function () {
    // 禁用浏览器的部分事件
    $(document).bind({
        contextmenu: function (e) {
            return false;
        },
        keydown: function (e) {
            if ((e.altKey) && ((e.keyCode==37) || (e.keyCode==39))) {
                return false;
            }
            if ((e.keyCode == 116) || (e.ctrlKey && e.keyCode == 82) || (e.ctrlKey && e.keyCode == 67) || (e.ctrlKey && e.keyCode == 86) || (e.ctrlKey && e.keyCode == 90) || (e.ctrlKey && e.keyCode == 89)) {
                e.keyCode = 0;
                return false;
            }
            if (e.shiftKey && e.keyCode == 121) {
                return false;
            }
        }
    });
    $(window).bind({
        beforeunload : function (e) {
            return 'Are you sure to quit the GRE Test ？';
        }
    });
    // 对话框提醒
    if ($.cookie('has_tip_show') === null) {
        GRE.load('/static/js/depends/UI_Dialog.js', function () {
            var dialog = GRE.getDialog({
                titleText: '友情提示',
                contentText: '<div class="friend-tip"><p>按F11键进入全屏模式</p><a href="#" id="J_iknow">我知道了</a></div>'
            });
            $('#J_iknow').click(function () {
                dialog.close();
                return false;
            });
        });
        $.cookie('has_tip_show', true);
    }
    // 初始化操作区
    GRE.operation.init();
});
</script>
<script type="text/javascript" src="/static/js/gretest.js-min.js"></script>

		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
