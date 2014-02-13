<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:36:41
         compiled from "/var/grer/template/web/depends/inc_verbal_single.html" */ ?>
<?php /*%%SmartyHeaderCode:27887216052fcca69a7b430-03012141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0f89ab9fb467f57daee0cad5afe937207458cd9c' => 
    array (
      0 => '/var/grer/template/web/depends/inc_verbal_single.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '27887216052fcca69a7b430-03012141',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="verbal-single">
    <div class="hd">
        <p>
            <?php if (count($_smarty_tpl->getVariable('verbal')->value['choices'])==1){?>
            Select one entry for the blank. Fill the blank in the way that best completes the text.
            <?php }else{ ?>
            For each blank select one entry from the corresponding column of choices. Fill all blanks in the way that best completes the text.
            <?php }?>
        </p>
    </div>
    <div class="bd">
        <p><strong><?php echo $_smarty_tpl->getVariable('verbal')->value['question'];?>
</strong></p>
        <div class="answers cf">
            <?php  $_smarty_tpl->tpl_vars["choices"] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('verbal')->value['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["choices"]->key => $_smarty_tpl->tpl_vars["choices"]->value){
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["choices"]->key;
?>
            <dl>
                <dt><?php if (count($_smarty_tpl->getVariable('verbal')->value['choices'])>1){?><?php if ($_smarty_tpl->getVariable('key')->value==0){?>Blank (i)<?php }elseif($_smarty_tpl->getVariable('key')->value==1){?>Blank (ii)<?php }else{ ?>Blank (iii)<?php }?><?php }?></dt>
                <dd>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars["choice"] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('choices')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars["choice"]->key => $_smarty_tpl->tpl_vars["choice"]->value){
?>
                        <li><?php echo $_smarty_tpl->getVariable('choice')->value;?>
</li>
                        <?php }} ?>
                    </ul>
                </dd>
            </dl>
            <?php }} ?>
        </div>
        <div class="explain cf">
            <span class="detail"><b>答案：</b><?php echo $_smarty_tpl->getVariable('verbal')->value['explain'];?>
</span>
            <?php if ($_smarty_tpl->getVariable('verbal')->value['id']<$_smarty_tpl->getVariable('verbal')->value['maxId']){?>
            <div class="fr next cf"><a href="/<?php echo $_smarty_tpl->getVariable('verbal')->value['action'];?>
/<?php echo $_smarty_tpl->getVariable('verbal')->value['id']+1;?>
" class="login-btn">下一题</a></div>
            <?php }?>
        </div>
    </div>
</section>