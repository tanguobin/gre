<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:09:55
         compiled from "/var/grer/template/web/depends/inc_operation.html" */ ?>
<?php /*%%SmartyHeaderCode:160954490052fcc423141325-47690207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a06ec014e2b72b5a07988d45f2b0ed3103f09e2' => 
    array (
      0 => '/var/grer/template/web/depends/inc_operation.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '160954490052fcc423141325-47690207',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_default')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.default.php';
?><ol class="operation" id="J_operation">
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasReturn']['url'],"/");?>
' class="return-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasReturn'])){?> hide<?php }?>" id="J_return" title="Return"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasGoto']['url'],"/");?>
' class="goto-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasGoto'])){?> hide<?php }?>" id="J_goto" title="Go To Question"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasContinue']['url'],"/");?>
' class="continue-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasContinue'])){?> hide<?php }?>" id="J_continue" title="Continue"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasQuit']['url'],"/");?>
' class="quit-test-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasQuit'])){?> hide<?php }?>" id="J_quit-test" title="Quit Test"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasExit']['url'],"/");?>
' class="exit-section-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasExit'])){?> hide<?php }?>" id="J_exit-section" title="Exit Section"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasMark']['url'],"/");?>
' class="mark-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasMark'])){?> hide<?php }?>" id="J_mark" title="Mark"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasReview']['url'],"/");?>
' class="review-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasReview'])){?> hide<?php }?>" id="J_review" title="Review"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasHelp']['url'],"/");?>
' class="help-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasHelp'])){?> hide<?php }?>" id="J_help" title="Help"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasBack']['url'],"/");?>
' class="back-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasBack'])){?> hide<?php }?>" id="J_back" title="Back"></a></li>
    <li><a href='<?php echo smarty_modifier_default($_smarty_tpl->getVariable('operation')->value['hasNext']['url'],"/");?>
' class="next-btn<?php if (!isset($_smarty_tpl->getVariable('operation')->value['hasNext'])){?> hide<?php }?>" id="J_next" title="Next"></a></li>
</ol>