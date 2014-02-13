<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:37:40
         compiled from "/var/grer/template/web/depends/inc_quantity_input.html" */ ?>
<?php /*%%SmartyHeaderCode:185913631852fccaa4147382-28952753%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd896a569b4f01e024429236213049a856b58dc15' => 
    array (
      0 => '/var/grer/template/web/depends/inc_quantity_input.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '185913631852fccaa4147382-28952753',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="quantity">
    <div class="hd"><p><strong><?php echo $_smarty_tpl->getVariable('quantity')->value['question'];?>
</strong></p></div>
    <div class="bd">
        <div class="question"><?php echo $_smarty_tpl->getVariable('quantity')->value['input'];?>
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