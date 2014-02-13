{extends file="lib/framework/base_fw.html"}

{block name="title"} - 个人中心{/block}

{block name="currentUC"} class="nav-active"{/block}

{block name="body"}
{if $userInfo.isLogin}
<div class="ucenter tabs">
    <div class="hd">
        <ul class="tab-control" id="J_tab-control">
            <li class="current ui-tab-first" rel="issue">Issue任务({$issue.count|default:0})</li>
            <li rel="argument">Argument任务({$argument.count|default:0})</li>
            <li rel="verbal">文字推理({$verbal.count|default:0})</li>
            <li rel="quantity">数理推理({$quantity.count|default:0})</li>
        </ul>
    </div>
    <div class="bd">
        <ul class="tab-content" id="J_tab-content">
            <li rel="issue" class="current">
                {if $issue.count == 0}
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过分析性写作(Issue任务)的试题</p></div>
                {else}
                {include file="lib/modules/uc_tab_item.html"}
                {if $issue.count > 20}
                <a href="#" class="J_feed-more feed-more" data-start="20">查看更多</a>
                {/if}
                {/if}
            </li>
            <li rel="argument">
                {if $argument.count == 0}
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过分析性写作(Argument任务)的试题</p></div>
                {/if}
            </li>
            <li rel="verbal">
                {if $verbal.count == 0}
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过文字推理的试题</p></div>
                {/if}
            </li>
            <li rel="quantity">
                {if $quantity.count == 0}
                <div class="nk-uc-null"><p class="no-feed-title">还没有做过数理推理的试题</p></div>
                {/if}
            </li>
        </ul>
    </div>
</div>
{else}
<script type="text/javascript">
(function () {
    GRE.login.login();
}) ();
</script>
{/if}
{/block}

{block name="foot"}
<script type="text/javascript">
var pageData = {
    issueCount: {$issue.count},
    argumentCount: {$argument.count},
    verbalCount: {$verbal.count},
    quantityCount: {$quantity.count}
};
(function () {
    $('#J_tab-control').click(function (e) {
        var self = this,
            target = $(e.target),
            tabContent = $('#J_tab-content');
        if (target.hasClass('current')) {
            return;
        }
        if (target.is('li')) {
            var rel = target.attr('rel'),
                reli = tabContent.find('li[rel="' + rel + '"]'),
                dlength = reli.children().length,
                count = pageData[rel + 'Count'];
            $(self).children().removeClass('current');
            target.addClass('current');
            if (pageData[rel + 'Count'] != 0 && dlength == 0) {
                GRE.get('/ajax/uc/getLogList', { type: rel, start: 0 }, function (data) {
                    data = jQuery.parseJSON(data);
                    var html = data.content;
                    if (count > 20) {
                        html = [html, '<a href="#" class="J_feed-more feed-more" data-start="20">查看更多</a>'].join('');
                    }
                    reli.html(html);
                    tabContent.children().removeClass('current');
                    tabContent.find('li[rel="' + rel + '"]').addClass('current');
                });
            } else {
                tabContent.children().removeClass('current');
                tabContent.find('li[rel="' + rel + '"]').addClass('current');
            }
        }
    });
    $('#J_tab-content').click(function (e) {
        var self = this,
            target = $(e.target);
        if (target.hasClass('J_feed-more')) {
            var rel = target.parent().attr('rel'),
                start = parseInt(target.attr('data-start')),
                count = pageData[rel + 'Count'];
            GRE.get('/ajax/uc/getLogList', { type: rel, start: start }, function (data) {
                data = jQuery.parseJSON(data);
                var html = data.content;
                $(html).insertAfter(target.prev().removeClass('last'));
                if ((start + 20) > count) {
                    target.remove();
                } else {
                    target.attr('data-start', start + 20);
                }
            });
            return false;
        }
    });
})();
</script>
{/block}