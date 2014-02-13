{extends file="lib/framework/base_fw.html"}

{block name="title"} - {$article.title}{/block}

{block name="description"}{$article.title|escape} - {$article.question|escape}{/block}

{block name="currentQP"} class="nav-active"{/block}

{block name="body"}
{include file="lib/modules/writing.html"}
{if $article.id < $maxId}
<div class="fr next cf"><a id="J_next" class="login-btn" href="/{$article.type}/{$article.id + 1}">下一题</a></div>
{/if}
<script type="text/javascript">
var uyan_config = {
    'title':'{$article.title}',
    'pic':'http://www.igrer.com/static/img/logo.png'
};
</script>
<div id="uyan_frame"></div>
{/block}

{block name="foot"}
{if strpos($smarty.server.HTTP_HOST, 'igrer.com') !== false}
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1643114" async=""></script>
{/if}
{/block}