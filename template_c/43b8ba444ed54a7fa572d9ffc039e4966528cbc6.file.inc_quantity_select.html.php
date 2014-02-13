<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:46:12
         compiled from "/var/grer/template/web/depends/inc_quantity_select.html" */ ?>
<?php /*%%SmartyHeaderCode:162044958552fccca44e81e6-01645505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b8ba444ed54a7fa572d9ffc039e4966528cbc6' => 
    array (
      0 => '/var/grer/template/web/depends/inc_quantity_select.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '162044958552fccca44e81e6-01645505',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="quantity">
    <div class="bd J_question">
        <p><strong><?php echo $_smarty_tpl->getVariable('quantity')->value['question'];?>
</strong></p>
        <div class="answers">
            <ul class="<?php echo $_smarty_tpl->getVariable('quantity')->value['qtype'];?>
">
                <?php  $_smarty_tpl->tpl_vars["choice"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('quantity')->value['choices'][0]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["choice"]->key => $_smarty_tpl->tpl_vars["choice"]->value){
?>
                <li><?php echo $_smarty_tpl->getVariable('choice')->value;?>
</li>
                <?php }} ?>
            </ul>
        </div>
        <div class="explain cf">
            <span class="detail"><b>答案：</b><?php echo $_smarty_tpl->getVariable('quantity')->value['explain'];?>
</span>
            <?php if ($_smarty_tpl->getVariable('quantity')->value['id']<$_smarty_tpl->getVariable('quantity')->value['maxId']){?>
            <div class="next fr cf"><a href="/<?php echo $_smarty_tpl->getVariable('quantity')->value['action'];?>
/<?php echo $_smarty_tpl->getVariable('quantity')->value['id']+1;?>
" class="login-btn">下一题</a></div>
            <?php }?>
        </div>
    </div>
</section>