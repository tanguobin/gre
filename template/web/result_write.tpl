{extends file="lib/framework/base_fw.html"}

{block name="title"} - 您的成绩单{/block}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="body"}
<div class="divider"></div>
<div class="result-page">
    <div class="mod-hd cf"><span class="hand-i"></span><div class="congrats">恭喜您，大功告成！</div></div>
    <div class="mod-bd cf">
        <p class="title">
            <span id="J_title"></span>
            <span id="J_question"></span>
        </p>
        <p class="article" id="J_article"></p>
        <div class="save-adv">
            <b>您还可以将答案保存至个人中心：</b>
            <ol class="advantage"><li><span class="pass-reg-i"></span>随时随地分享您的文章到sns网站；</li><li><span class="pass-reg-i"></span>关注认识更多的好友；</li><li><span class="pass-reg-i"></span>随时随地查看自己的历史数据。</li></ol>
            <a href="/" id="J_save" class="save-btn" title="保存至个人中心" alt="保存至个人中心"></a>
        </div>
    </div>
</div>
<script type="text/javascript">
var pageData = {
    sectionType : '{$sectionType}',
    data : window.name.split('____')
};
(function () {
    if (window.name === '') {
        location.href = '/modeltest/' + pageData.sectionType;
    }
    $('#J_title').html(pageData.data[1]);
    $('#J_question').html(pageData.data[2]);
    $('#J_article').html(pageData.data[3].replace(/\n/g, '<br/>').replace(/\t/g, "<span class='tab'></span>"));
}) ();
</script>
{/block}

{block name="foot"}
<script type="text/javascript">
(function () {
    GRE.login.init({ trigger: $('#J_save'), onlogin: function () {
        var article = pageData.data[3];
        if (GRE.dialog) {
            GRE.dialog.close();
        }
        if (pageData.saved === true) {
            GRE.getDialog({ contentText: '<div class="friend-tip">重复保存！</div>' });
            return;
        }
        var lessHtml = ['<div class="friend-tip"><p>您写的太少了，字数不够！</p><a href="/modeltest/', pageData.sectionType, '">重新编写</a></div>'].join('');
        if (GRE.getByteLength(article) < 100) {
            GRE.load('/static/js/depends/UI_Dialog.js', function () {
                GRE.getDialog({ contentText: lessHtml, width: 300 });
            });
        } else {
            GRE.post('/ajax/writing/save', { id: pageData.data[0], article: article, type: pageData.sectionType }, function (data) {
                data = jQuery.parseJSON(data);
                if (data.content === 0) {
                    GRE.getDialog({
                        contentText: '<div class="friend-tip"><p>恭喜您，保存成功！您可以到个人中心查看！</p><a href="/home/uc">去个人中心</a></div>',
                        width: 300, height: 120
                    });
                    window.name = ''; pageData.saved = true;
                } else if (data.content === 1) {
                    GRE.getDialog({
                        contentText: '<div class="friend-tip"><p>对不起，保存失败！请稍后再试！</p></div>',
                        width: 300
                    });
                } else if (data.content === 2) {
                    GRE.getDialog({ contentText: lessHtml, width: 300 });
                }
            });
        }
    }});
}) ();
</script>
{/block}

{block name="nav"}{/block}
