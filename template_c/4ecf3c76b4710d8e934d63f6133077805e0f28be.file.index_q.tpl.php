<?php /* Smarty version Smarty3-RC3, created on 2014-02-13 21:07:49
         compiled from "/var/grer/template/web/index_q.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79702630352fcc3a5ef10b2-38518065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ecf3c76b4710d8e934d63f6133077805e0f28be' => 
    array (
      0 => '/var/grer/template/web/index_q.tpl',
      1 => 1371479562,
    ),
    'da2e18fb792f1fb4bfb0e4bdf1bc78f45501fe55' => 
    array (
      0 => '/var/grer/template/lib/framework/base_fw.html',
      1 => 1392274717,
    ),
  ),
  'nocache_hash' => '79702630352fcc3a5ef10b2-38518065',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_block_module')) include '/var/grer/template/lib/plugins/block.module.php';
if (!is_callable('smarty_modifier_date_format')) include '/var/grer/framework/lib/smarty/libs/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>爱GRE模考网(igrer.com) - 数量推理</title>
        <?php  $_config = new Smarty_Internal_Config("global.inc.cfg", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, $_smarty_tpl->smarty); ?>
        <meta name="keywords" content="GRE，新G，新GRE，托福，TOELF，出国留学，出国考试，模拟考试"/>
        <meta name="description" content="Quantitative Reasoning(数理推理)测试考查考生基本数学技能、基本数学概念的理解、定量推理、建模以及利用数量方法解决问题的能力。" />
        <!--[if lt IE 9]><script src="/static/js/html5.js"></script><![endif]-->
        
        <link href="/static/css/common.css-min.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="/static/js/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="/static/js/common.js-min.js"></script>
        
    </head>
    <body class="page">
        <div class="top-bar">
            <div class="inner">
                <ul class="top-bar-menu">
                    <li class="links">
                        <?php if ($_smarty_tpl->getVariable('userInfo')->value['isLogin']){?><a href="/home/uc" title="<?php echo $_smarty_tpl->getVariable('userInfo')->value['userName'];?>
"><?php echo $_smarty_tpl->getVariable('userInfo')->value['userName'];?>
</a><a href="/" id="J_logout" title="退出">退出</a><?php }else{ ?><a title="登录" href="/" id="J_login">登录</a><a href="/account/apply" target="_blank">注册</a><?php }?><a class="add-fav" id="J_add-fav" href="#">收藏</a>
                    </li>
                    <li class="J_hover">
                        <div class="qqgroup">
                            <p class="hd">QQ群号：<!--<a target="_blank" href="http://qun.qq.com/#jointhegroup/gid/29557399">-->29557399<!--</a>--></p>
                            <!--<p class="bd"><a target="_blank" href="http://qun.qq.com/#jointhegroup/gid/"></a></p>-->
                        </div>
                    </li>
                    <li>
                        <div class="weibo-follow">
                            <a title="新浪微博" class="follow-third-i follow-third-tsina" href="http://www.weibo.com/u/2784476625" target="_blank" rel="nofollow">新浪微博</a>
                            <a title="腾讯微博" class="follow-third-i follow-third-tqq" href="http://t.qq.com/igrer_com" target="_blank" rel="nofollow">腾讯微博</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
        (function () {
            GRE.login.init({ trigger: $('#J_login') });
            GRE.favorite.init();
            $('#J_logout').click(function () {
                GRE.get('/ajax/account/logout', {}, function (data) {
                    location.reload(true);
                });
                return false;
            });
        })();
        </script>
        
        <header id="header">
            <a href="/" title="爱GRE模考网" class="logo"></a>
            <nav class="nav-channel">
                <ul class="nav-channel-list">
                    <li><a href="/" title="分析性写作" alt="分析性写作">分析性写作</a></li>
                    <li><a href="/home/verbal" title="文字推理" alt="文字推理">文字推理</a></li>
                    <li class="nav-active"><a href="/home/quantity" title="数量推理" alt="数量推理">数量推理</a></li>
                    <li><a href="/home/pool" title="题目讨论" alt="数量推理">题目讨论</a></li>
                    <li><a href="/home/uc" title="个人中心" rel="nofollow">个人中心</a></li>
                    <li><a href="/home/help" title="关于我们" rel="nofollow">关于我们</a></li>
                </ul>
            </nav>
        </header>
        <section id="container"><div class="layout"><div class="col-main"><div class="main-wrap" id="J_main-wrap">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('module', array('name'=>"rect_block",'class'=>"enter-quantity",'title'=>"Quantitative Reasoning")); $_block_repeat=true; smarty_block_module(array('name'=>"rect_block",'class'=>"enter-quantity",'title'=>"Quantitative Reasoning"), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

    <div class="intro">考场提醒：进入考场前请确保您有35分钟时间完成该部分题目的作答。</div>
    <a href="/modeltest/quantity" title="数量推理考场" alt="数量推理考场" class="enter-btn">点击进入此考场</a>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_module(array('name'=>"rect_block",'class'=>"enter-quantity",'title'=>"Quantitative Reasoning"), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    <?php $_smarty_tpl->smarty->_tag_stack[] = array('module', array('name'=>"mod_block",'class'=>"overview",'title'=>"数量推理概述")); $_block_repeat=true; smarty_block_module(array('name'=>"mod_block",'class'=>"overview",'title'=>"数量推理概述"), null, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl);while ($_block_repeat) { ob_start();?>

    <p>新GRE考试的Quantitative Reasoning测试考查学生的：</p>
    <p><ul>
        <li><strong>基本数学技能</strong></li>
        <li><strong>基本数学概念的理解</strong></li>
        <li><strong>定量推理、建模以及利用数量方法解决问题的能力</strong></li>
    </ul></p>
    <p>测试中的一些问题以现实生活为背景提出，其他问题则为纯数学背景。测试包括对以下四个方面的技能、概念和能力的检测。</p>
    <p>算术(Arithmetic)，包括整数的类型和属性，如可约性(divisibility)、因式分解(factorization)、质数(prime numbers)、余数(remainders)和奇偶数(odd and even integers)；算术运算(arithmetic operations)、指数(exponents)和根式(radicals)；以及一些概念，如估算(estimation)、百分比(percent)、比率(ratio)、比例(rate)、绝对值(absolute value)、数轴(the number line)、十进制(decimal representation)和数列(sequences of numbers)。</p>
    <p>代数(Algebra)，包括指数运算(operations with exponents)；因式分解和代数式的化简(factoring and simplifying algebraic expressions)；关系(relations)、函数(functions)、方程(equation)和不等式(inequalities)；求解二元一次方程或不等式(linear and quadratic equations and inequalities)；求解联立方程和不等式(simultaneous equations and inequalities)；列方程解数学题；解析几何(也叫坐标几何, coordinate geometry)，包括函数的图像、方程、不等式以及截距和斜率。</p>
    <p>几何(Geometry)，包括平行线(parallel lines)、垂线(perpendicular lines)、圆(circles)和三角形(triangles)[包括等腰、等边、30°-60°-90°三角形(isosceles, equilateral, and 30°-60°-90° triangles)]、四边形(quadrilaterals)、其他多边形(polygons)、全等和相似图形(congruent and similar figures)、三维图形(three-dimensional figures)、面积(area)、周长(perimeter)、体积(volume)、勾股定理(the Pythagorean theorem)、角度计算(angle measurement in degrees)。不考几何证明。</p>
    <p>数据分析(Data analysis)，包括基本的描述统计学，如平均值(mean)、中位数(median)、众数(mode)、极差(range)、标准差(standard deviation)、四分位差(interquartile range)、四分位数(quartiles)、百分位数(percentiles)；表格和图形中的数据解析，比如线图(line graphs)、柱状图(bar graphs)、饼图(circle graphs)、箱形图(boxplots)、散点图(scatterplots)和频率分布(frequency distributions)；初等概率，如独立事件(independent events)和复合事件(compound events)的概率；随机变量(random varibles)和概率分布，包括正态分布(normal distributions)；计算方法，比如组合(combinations)、排列(permutations)和韦恩图(Venn diagrams)。以上这些内容基本上都包含在高中的代数课和统计学初步课程中。不考推断统计学(inferential statistics)的内容。</p>
    <p>这部分内容包括高中数学和统计学，考查的水平通常不超过第二册代数(a second course in algebra)；不包括三角学(trigonometry)、微积分(calculus)和其他更高水平的数学内容。</p>
    <p>Quantitative Reasoning测试中使用的数学符号、术语和定律与高中阶段的标准用法相同。例如，数轴的正方向为右，距离不能为负，质数大于1。若题目中涉及非标准用法，则会附有详细说明。</p>
    <p>更多关于Quantitative Reasoning测试内容信息，请访问网址：<a href="http://www.ets.org/gre/revised/prepare" target="_blank">www.ets.org/gre/revised/prepare</a>。</p>
    <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_module(array('name'=>"mod_block",'class'=>"overview",'title'=>"数量推理概述"), $_block_content, $_smarty_tpl->smarty, $_block_repeat, $_smarty_tpl); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div></div></div></section>
        <footer id="footer">
            <p class="footer-nav">
                <a href="/home/help" rel="nofollow">关于我们</a>
                |
                <a href="/home/help#cooperation" rel="nofollow">商务合作</a>
                |
                <a href="/home/help#links" rel="nofollow">友情链接</a>
                |
                <a href="/home/help#announce" rel="nofollow">免责声明</a>
            </p>
            <p class="copyright">
                &copy;Copyright igrer.com <?php echo smarty_modifier_date_format(time(),"%Y");?>
. All rights reserved
            </p>
        </footer>
		<?php if (strpos($_SERVER['HTTP_HOST'],'igrer.com')!==false){?>
        <script type="text/javascript">
            var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fa7fd890cb7cf13b6d0084dc4c1825d5e' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <?php }?>
    </body>
</html>
