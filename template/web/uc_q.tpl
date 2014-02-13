{extends file="lib/framework/base_fw.html"}

{block name="title"} - 个人中心历史数理推理{/block}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="currentUC"} class="nav-active"{/block}

{block name="body"}
{if $quantity.index > 0 && $quantity.index < 9}
    {include file="web/depends/inc_history_quantity_compare.html"}
{elseif $quantity.index > 8 && $quantity.index < 17}
    {include file="web/depends/inc_history_quantity_select.html"}
{elseif $quantity.index > 16 && $quantity.index < 21}
    {include file="web/depends/inc_history_quantity_input.html"}
{/if}
{/block}