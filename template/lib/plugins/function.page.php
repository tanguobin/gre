<?php
/***************************************************************************
 * 
 * Copyright (c) 2010 Baidu.com, Inc. All Rights Reserved
 * $Id$ 
 * 
 **************************************************************************/
 
 
 
/**
 * @file function.page.php
 * @author xq(zhengqianglong@baidu.com)
 * @date 2010/07/06 11:16:06
 * @version $Revision$ 
 * @brief 
 * 给予smarty插件形式的php分页代码
 * @params
 *	current : 当前起始数
 *	total	: 数据总数
 *	url		: 页面url
 *	rn		: 每页显示数目(可选)
 *  
 **/

function smarty_function_page($params, $smarty)
{
	if (intval($params['total']) == 0 || intval($params['current']) < 0) {
		return false;
	}

	///////////////////////////////////////////////////////////
	// 数据初始化
	// 当前起始数
	$current_num = intval($params['current']);
	// 数据总数
	$total_num = intval($params['total']);
	// 每页显示多少条
	$result_num = (isset($params['rn']))? intval($params['rn']) : 25;
	// 页面url
	$url = (preg_match("/\?/",$params['url']))? $params['url'].'&' : $params['url'].'?';
	$head_offset = 4;     // 当前页向前偏移位置
	$tail_offset = 5;     // 当前页向后偏移位置
	$page_num_limit = 10;	// 最多显示10个页码
	$output = '';

	// 如果只有1页，不显示翻页内容
	if ($total_num <= $result_num) {
		return;
	}

	///////////////////////////////////////////////////////////
	// 数据计算
	// 当前页码= 当前起始数/每页显示数目
	$current_page_num = intval($current_num/$result_num);
	// 总页码=总数/每页显示数目
	$total_page_num = intval($total_num/$result_num);
	// 除不尽的情况
	if (($total_page_num * $result_num) < $total_num) {
		$total_page_num++;
	}

	///////////////////////////////////////////////////////////
	// 逻辑处理
	// 总页数小于指定页数
	if ($total_page_num <= $page_num_limit) {
		$start = 0;
		$end = $total_page_num;
	} else {
		// 当前页靠前
		if ($current_page_num <= $head_offset) {
			$start = 0;
			$end = $page_num_limit;
		} else if (($current_page_num + $tail_offset) >= $total_page_num) {
			// 当前页靠后
			$start = $total_page_num - $page_num_limit;
			$end = $total_page_num;
		} else {
			// 当前页在中间
			$start = $current_page_num - $head_offset;
			$end = $start + $page_num_limit;
		}
		// 如果1消失了，需要显示首页
		if ($current_page_num > $head_offset) {
			$output .= '<a href="'.$url.'pn=0">[首页]</a>';
		}
	}
	// 只要不是第一页，都显示上一页
	if ($start != $current_page_num) {
		$output .= '<a href="'.$url.'pn='.($current_num-$result_num).'">[上一页]</a>';
	}
	// 显示页码
	for ($i = $start; $i < $end; $i++) {
		if ($i == $current_page_num) {
			$output .= '<b>'. ($i+1) .'</b>';
		} else {
			$output .= '<a href="'.$url.'pn='.($i * $result_num).'">['.($i+1).']</a>';
		}
	}
	// 只要不是最后一页，都显示下一页
	if (($current_page_num+1) != $total_page_num) {
		$output .= '<a href="'.$url.'pn='.($current_num + $result_num).'">[下一页]</a>';
	}
	// 如果最后一个页面消失了，需要显示最后一页
	if ($total_page_num > $page_num_limit && ($current_page_num + $tail_offset + 1) < $total_page_num) {
		$output .= '<a href="'.$url.'pn='.(($total_page_num-1) * $result_num).'">[最后一页]</a>';
	}

	return $output;

}




/* vim: set ts=4 sw=4 sts=4 tw=100 noet: */
?>
