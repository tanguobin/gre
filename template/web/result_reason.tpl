{extends file="lib/framework/base_fw.html"}

{block name="title"} - 您的成绩单{/block}

{block name="meta"}<meta name="robots" content="no-index, nofollow" />{/block}

{block name="body"}
<div class="divider"></div>
<div class="result-page">
    <div class="mod-hd cf"><span class="hand-i"></span><div class="congrats">恭喜您，大功告成！<span id="J_accuracy"></span></div></div>
    <div class="mod-bd cf">
        <div id="J_answer-list" class="answer-list-{$sectionType}"></div>
        <div class="save-adv">
            <b>您还可以将答案保存至个人中心：</b>
            <ol class="advantage"><li><span class="pass-reg-i"></span>随时随地分享题目到sns网站；</li><li><span class="pass-reg-i"></span>认识更多G友；</li><li><span class="pass-reg-i"></span>方便复习过去做过的试题。</li></ol>
            <a href="/" id="J_save" class="save-btn" title="保存至个人中心" alt="保存至个人中心"></a>
        </div>
    </div>
</div>
<script type="text/javascript">
var pageData = {
    sectionType : '{$sectionType}',
    jsons : eval(GRE.trim(window.name)),
    submitData: '['
};
(function () {
    if (window.name === '') { location.href = '/modeltest/' + pageData.sectionType; }
    var jsons = pageData.jsons, answer = '', owns = [], own = '', own_ori = '', span = '', question = '', explain = '', qid = '', dlist = [], inputs = [], rights = 0, percent = 0.0,
        map_m = [['A', 'B', 'C'], ['D', 'E', 'F'], ['G', 'H', 'I']], map_s = ['A', 'B', 'C', 'D', 'E'];
    for (var key = 0, length = jsons.length; key < length; key++) {
        answer = jsons[key]['answer'];
        explain = jsons[key]['explain'];
        qid = jsons[key]['qid'];
        question = jsons[key]['question'];
        if (pageData.sectionType === 'verbal') {
            if (GRE.isNumber(answer)) {
                own = parseInt(jsons[key]['own']) + 1;
            } else {
                owns = jsons[key]['own'].split(',');
                key < 7 ? (function (map) {
                    own = map[0][owns[0]];
                    for (var i = 1; i < owns.length; i++) {
                        if (owns[i] === '') { break; }
                        own += ', ' + map[i][owns[i]];
                    }
                }) (map_m): (function (map) {
                    own = map[owns[0]];
                    for (var i = 1; i < owns.length; i++) {
                        if (owns[i] === '') { break; }
                        own += ', ' + map[owns[i]];
                    }
                })(map_s);
            }
        } else {
            if (key >= 0 && key < 8) {
                own = map_s[jsons[key]['own']];
            } else if (key > 7 && key < 16) {
                owns = jsons[key]['own'].split(',');
                own = map_s[owns[0]];
                for (var i = 1; i < owns.length; i++) {
                    if (owns[i] === '') { break; }
                    own += ', ' + map_s[owns[i]];
                }
            } else {
                answer = eval(answer);
                own_ori = jsons[key]['own'];
                own = eval(own_ori);
            }
        }
        if (own == answer) {
            rights++;
            span = '<span class="right-i"></span>';
        } else {
            span = '<span class="false-i"></span>';
        }
        pageData.submitData = [pageData.submitData, '{ "useranswer": "', own, '", "qid": "', qid, '" }', key === length - 1 ? '' : ','].join('');
        dlist.push(['<div class="answer-item"><div class="cf">', key + 1, '、', question, '</div><div class="explain cf">', span, '<span class="detail"><b>Answer：</b>', explain, '</span></div></div>'].join(''));
    }
    pageData.submitData += ']';
    percent = rights / jsons.length;
    if (percent < 0.5) {
        $('#J_accuracy').html(['答对 ', rights, ' 题，答错 ', jsons.length - rights, ' 题，再接再励哦！'].join(''));
    } else if (percent > 0.8) {
        $('#J_accuracy').html(['答对 ', rights, ' 题，答错 ', jsons.length - rights, ' 题，继续保持哦！'].join(''));
    } else {
        $('#J_accuracy').html(['答对 ', rights, ' 题，答错 ', jsons.length - rights, ' 题，继续努力哦！'].join(''));
    }
    $('#J_answer-list').html(dlist.join(''));
    if (pageData.sectionType === 'quantity') {
        var childs = $('#J_answer-list').children();
        for (var i = childs.length - 1; i > 15; i--) {
            own_ori = jsons[i]['own'];
            inputs = $(childs[i]).find('.question input');
            inputs.length === 1 ? inputs.val(own_ori) : (function () {
                $(inputs[0]).val(own_ori.split('/')[0]);
                $(inputs[1]).val(own_ori.split('/')[1]);
            }) ();
        }
    }
}) ();
</script>
{/block}

{block name="foot"}
<script type="text/javascript">
(function () {
    GRE.login.init({ trigger: $('#J_save'), onlogin: function () {
        if (GRE.dialog) { GRE.dialog.close(); }
        var lessHtml = '<div class="friend-tip">试题未做完，不允许保存！</div>';
        if (pageData.saved === true) {
            GRE.getDialog({ contentText: '<div class="friend-tip">重复保存！</div>' });
            return;
        }
        if (pageData.jsons.length < 20) {
            GRE.getDialog({ contentText: lessHtml });
            return;
        }
        GRE.post('/ajax/reasoning/save', { type: pageData.sectionType, data: pageData.submitData }, function (data) {
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
                    width: 300, height: 100
                });
            } else if (data.content === 2) {
                GRE.getDialog({ contentText: lessHtml });
            }
        });
    }});
})();
</script>
{/block}

{block name="nav"}{/block}