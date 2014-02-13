{extends file="lib/framework/base_fw.html"}

{block name="title"} - 个人中心历史文章{/block}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="currentUC"} class="nav-active"{/block}

{block name="body"}
{include file="lib/modules/writing.html"}
{/block}

{block name="foot"}
<script type="text/javascript">
var pageData = {
    'article': '{$article.article|escape:"javascript"}'
};
(function () {
    $('#J_editor-ui').val(pageData.article);
}) ();
</script>
{/block}