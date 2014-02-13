<?php
/**
 * Created by gbtan.
 * User: Administrator
 * Date: 12-5-10
 * Time: 下午9:53
 * article正文的html处理
 */

function smarty_modifier_contentDeal ($content) {
    $content = preg_replace(
        array(
            "/\n/",
            "/\t/"
        ),
        array(
            "<br/>",
            "<span class='tab'></span>"
        ), $content);

    return $content;
}