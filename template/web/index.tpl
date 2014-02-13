{extends file="lib/framework/base_fw.html"}

{block name="title"}{/block}

{block name="currentAW"} class="nav-active"{/block}

{block name="title"}{/block}

{block name="body"}
    {module name="rect_block" class="enter-issue" title="Analyze an Issue"}
    <div class="intro">考场提醒：进入考场前请确保您有30分钟时间完成该部分题目的作答。</div>
    <a href="/modeltest/issue" title="Issue考场" alt="Issue考场" class="enter-btn">点击进入此考场</a>
    {/module}
    {module name="rect_block" class="enter-argument" title="Analyze an Argument"}
    <div class="intro">考场提醒：进入考场前请确保您有30分钟时间完成该部分题目的作答。</div>
    <a href="/modeltest/argument" title="Argument考场" alt="Argument考场" class="enter-btn">点击进入此考场</a>
    {/module}
    {module name="mod_block" class="overview" title="分析性写作概述"}
    <p><strong>Analytical Writing(分析性写作测试)考查考生的批判性思维和分析性写作技能、清晰地表达并支持复杂观点的能力、构建和评估论证的能力以及围绕一个主题集中、有条理地展开讨论的能力。</strong>此部分不考查特定的知识内容。</p>
    <p>Analytical Writing由两个独立计时的任务构成：</p>
    <p><ul>
            <li>一个30分钟的“Analyze an Issue”任务</li>
            <li>一个30分钟的“Analyze an Argument”任务</li>
    </ul></p>
    <p>Issue任务要求就一般性话题提出一个观点，题目中会包含如何就该话题进行回应提出明确的写作要求。考生需要评估这个话题，考虑其复杂性，并通过推理和实例展开论证以支持自己的观点。</p>
    <p>Argument任务是不同于Issue任务的挑战：它要求考生依据具体的题目要求对已有的论证进行评估。考生需要考虑这个论证是否合乎逻辑，而非简单地赞同或反对其中的观点。</p>
    <p>这两项写作任务性质互补：一个要求考生提出观点并提供论据支持的观点，以此来构建考生自己的论证；另一个则要求考生评估别人的论证，包括对其观点及其所提供的证据的评定。</p>
    <p>更多关于Analytical Writing测试内容信息，请访问网址：<a href="http://www.ets.org/gre/revised/prepare" target="_blank">www.ets.org/gre/revised/prepare</a>。</p>
    {/module}
{/block}