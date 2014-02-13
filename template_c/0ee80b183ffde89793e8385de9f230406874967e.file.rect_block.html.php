<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 15:00:57
         compiled from "/var/grer/template/lib/modules/rect_block.html" */ ?>
<?php /*%%SmartyHeaderCode:87465912652fc6da91624a5-43785135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ee80b183ffde89793e8385de9f230406874967e' => 
    array (
      0 => '/var/grer/template/lib/modules/rect_block.html',
      1 => 1371479562,
    ),
  ),
  'nocache_hash' => '87465912652fc6da91624a5-43785135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="rect <?php echo $_smarty_tpl->getVariable('class')->value;?>
">
    <?php if (isset($_smarty_tpl->getVariable('title')->value)){?><div class="hd"><h3><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h3></div><?php }?>
    <div class="bd"><?php echo $_smarty_tpl->getVariable('content')->value;?>
</div>
</section>