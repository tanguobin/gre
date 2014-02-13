{extends file="lib/framework/base_fw.html"}

{block name="title"} - 个人中心历史文字推理{/block}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="currentUC"} class="nav-active"{/block}

{block name="body"}
{if $verbal.index > 0 && $verbal.index < 7}
    {include file="web/depends/inc_history_verbal_single.html"}
{elseif $verbal.index >= 7 && $verbal.index < 12}
    {include file="web/depends/inc_history_verbal_reading.html"}
{elseif $verbal.index > 11 && $verbal.index < 16}
    {include file="web/depends/inc_history_verbal_multiple.html"}
{elseif $verbal.index > 15 && $verbal.index < 21}
    {include file="web/depends/inc_history_verbal_reading.html"}
{/if}
{/block}