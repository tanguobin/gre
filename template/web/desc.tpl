{extends file="lib/framework/test_base_fw.html"}

{block name="title"} {$title|escape} {/block}

{block name="body"}
{include file="web/depends/{$dependfn|escape:"url"}"}
{/block}