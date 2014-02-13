{extends file="lib/framework/base_fw.html"}

{block name="title"} - {if $verbal}{$verbal.question|strip_tags}{else}{$quantity.question|strip_tags}{/if}{/block}

{block name="description"}{if $verbal}{$verbal.question|strip_tags|escape}{else}{$quantity.question|strip_tags|escape}{/if}{/block}

{block name="currentQP"} class="nav-active"{/block}

{block name="body"}
{if $verbal}
    {if $verbal.action == 'vsingle'}
        {include file="web/depends/inc_verbal_single.html"}
    {elseif $verbal.action == 'vmult'}
        {include file="web/depends/inc_verbal_multiple.html"}
    {elseif $verbal.action == 'vlogic' || $verbal.action == 'vreading'}
        {include file="web/depends/inc_verbal_reading.html"}
    {/if}
    <script type="text/javascript">
    var uyan_config = {
        'title':'{$verbal.question}',
        'pic':'http://www.igrer.com/static/img/logo.png'
    };
    </script>
{else}
    {if $quantity.action == 'qcompare'}
        {include file="web/depends/inc_quantity_compare.html"}
    {elseif $quantity.action == 'qselect'}
        {include file="web/depends/inc_quantity_select.html"}
    {elseif $quantity.action == 'qinput'}
        {include file="web/depends/inc_quantity_input.html"}
    {/if}
    <script type="text/javascript">
    var uyan_config = {
        'title':'{$quantity.question}',
        'pic':'http://www.igrer.com/static/img/logo.png'
    };
    </script>
{/if}
<div id="uyan_frame"></div>
{/block}

{block name="foot"}
{if strpos($smarty.server.HTTP_HOST, 'igrer.com') !== false}
<script type="text/javascript" id="UYScript" src="http://v1.uyan.cc/js/iframe.js?UYUserId=1643114" async=""></script>
{/if}
{/block}