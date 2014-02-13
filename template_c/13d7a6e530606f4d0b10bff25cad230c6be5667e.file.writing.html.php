<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:09:55
         compiled from "/var/grer/template/lib/modules/writing.html" */ ?>
<?php /*%%SmartyHeaderCode:62857578652fcc4234c4137-13202395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13d7a6e530606f4d0b10bff25cad230c6be5667e' => 
    array (
      0 => '/var/grer/template/lib/modules/writing.html',
      1 => 1371520030,
    ),
  ),
  'nocache_hash' => '62857578652fcc4234c4137-13202395',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<section class="writing">
    <div class="col-m">
        <div class="m-wrap">
            <div class="writing-editor">
                <div class="editor-toolbar">
                    <a class="cut-btn" title="Cut" id="J_cut-btn" href="#"></a>
                    <a class="paste-btn-disable" title="Paste" id="J_paste-btn" href="#"></a>
                    <a class="undo-btn-disable" title="Undo" id="J_undo-btn" href="#"></a>
                    <a class="redo-btn-disable" title="Redo" id="J_redo-btn" href="#"></a>
                </div>
                <textarea class="editor-input" id="J_editor-ui"></textarea>
            </div>
        </div>
    </div>
    <div class="col-sub">
        <div class="title" id="J_article-title" data-id="<?php echo $_smarty_tpl->getVariable('article')->value['id'];?>
"><strong><?php echo $_smarty_tpl->getVariable('article')->value['title'];?>
</strong></div>
        <div class="question" id="J_article-question"><strong><?php echo $_smarty_tpl->getVariable('article')->value['question'];?>
</strong></div>
    </div>
</section>
<script type="text/javascript">
GRE.load('/static/js/editor.js-min.js', function () {
    var options = {
        cutbtn : '#J_cut-btn',
        pastebtn : '#J_paste-btn',
        undobtn : '#J_undo-btn',
        redobtn : '#J_redo-btn',
        editor : '#J_editor-ui',
        extracted : '',
        log : [''],
        index : 0
    };
    function store (val) {
        options.log.push(val);
        options.index = options.log.length - 1;
    }
    $(options.editor).focus().keydown(function (evt) {
        var me = this,
            sel = $(me).getSelection();
        if (evt.keyCode == 9) {
            sel.start === sel.end ? $(me).insertText('\t', sel.start, true) : $(me).deleteSelectedText();
            return false;
        }
    });
    $(options.cutbtn).click(function (evt) {
        var me = this;
        store($(options.editor).val());
        options.extracted = $(options.editor).extractSelectedText();
        $(options.editor).deleteSelectedText().focus();
        store($(options.editor).val());
        $(options.pastebtn)[0].className = 'paste-btn';
        $(options.undobtn)[0].className = 'undo-btn';
        return false;
    });
    $(options.pastebtn).click(function (evt) {
        if (evt.target.className == 'paste-btn') {
            $(options.editor).replaceSelectedText(options.extracted).focus();
            store($(options.editor).val());
            $(options.undobtn)[0].className = 'undo-btn';
        }
        return false;
    });
    $(options.undobtn).click(function (evt) {
        if (evt.target.className == 'undo-btn') {
            $(options.redobtn)[0].className = 'redo-btn';
            $(options.editor).val(options.log[--options.index]);
            if (options.index == 0) {
                $(options.undobtn)[0].className = 'undo-btn-disable';
            }
        }
        return false;
    });
    $(options.redobtn).click(function (evt) {
        if (evt.target.className == 'redo-btn') {
            $(options.editor).val(options.log[++options.index]);
            if (options.index == options.log.length) {
                $(options.redobtn)[0].className = 'redo-btn-disable';
            }
        }
        return false;
    });
});
</script>
