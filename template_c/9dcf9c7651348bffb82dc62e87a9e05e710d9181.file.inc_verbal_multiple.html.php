<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:34:49
         compiled from "/var/grer/template/web/depends/inc_verbal_multiple.html" */ ?>
<?php /*%%SmartyHeaderCode:76895199052fcc9f9a2b0f8-95147850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9dcf9c7651348bffb82dc62e87a9e05e710d9181' => 
    array (
      0 => '/var/grer/template/web/depends/inc_verbal_multiple.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '76895199052fcc9f9a2b0f8-95147850',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="verbal-multiple">
    <div class="hd">
        <p>Select the <b>two</b> answer choices that, when used to complete the sentence, fit the meaning of the sentence as a whole <b>and</b> produce completed sentences that are alike in meaning.</p>
    </div>
    <div class="bd J_question">
        <p><strong><?php echo $_smarty_tpl->getVariable('verbal')->value['question'];?>
</strong></p>
        <ul class="multiple">
        <?php  $_smarty_tpl->tpl_vars["choices"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('verbal')->value['choices'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["choices"]->key => $_smarty_tpl->tpl_vars["choices"]->value){
?>
            <li><?php echo $_smarty_tpl->getVariable('choices')->value;?>
</li>
        <?php }} ?>
        </ul>
        <div class="explain cf">
            <span class="detail"><b>答案：</b><?php echo $_smarty_tpl->getVariable('verbal')->value['explain'];?>
</span>
            <?php if ($_smarty_tpl->getVariable('verbal')->value['id']<$_smarty_tpl->getVariable('verbal')->value['maxId']){?>
            <div class="next fr cf"><a href="/<?php echo $_smarty_tpl->getVariable('verbal')->value['action'];?>
/<?php echo $_smarty_tpl->getVariable('verbal')->value['id']+1;?>
" class="login-btn">下一题</a></div>
            <?php }?>
        </div>
    </div>
</section>