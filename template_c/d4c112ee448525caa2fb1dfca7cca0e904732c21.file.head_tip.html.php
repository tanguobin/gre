<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:09:55
         compiled from "/var/grer/template/lib/modules/head_tip.html" */ ?>
<?php /*%%SmartyHeaderCode:206704110052fcc4235a4560-65734070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4c112ee448525caa2fb1dfca7cca0e904732c21' => 
    array (
      0 => '/var/grer/template/lib/modules/head_tip.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '206704110052fcc4235a4560-65734070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_default')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.default.php';
?><div class="head-tip">
    <b class="question-tip" id="J_question-tip">Question <?php echo smarty_modifier_default($_smarty_tpl->getVariable('question')->value['current'],1);?>
 of <?php echo smarty_modifier_default($_smarty_tpl->getVariable('question')->value['total'],1);?>
</b>
    <div class="time-tip" id="J_time-tip"><a href="#" class="hide-time-btn" id="J_time-btn"></a><b id="J_timer"><?php echo smarty_modifier_default($_smarty_tpl->getVariable('section')->value['time'],"00 : 30 : 00");?>
</b></div>
</div>
<script type="text/javascript">
$('#J_time-btn').click(function (evt) {
    var btn = evt.target;
    if (btn.className == 'hide-time-btn') {
        btn.className = 'show-time-btn';
        $('#J_timer').hide();
    } else {
        btn.className = 'hide-time-btn';
        $('#J_timer').show();
    }
    return false;
});
</script>