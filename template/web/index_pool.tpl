{extends file="lib/framework/base_fw.html"}

{block name="title"} - 题库{/block}

{block name="description"}爱GRE模考网为了方便各个考生对GRE某一类题型进行专项学习讨论，现对GRE全部题型分门别类，方便学习{/block}

{block name="currentQP"} class="nav-active"{/block}

{block name="body"}
    <div class="pool-list">
        <a href="/issue/1" title="Issue题集" alt="Issue题集" class="enter-btn">Issue题集</a>
        <a href="/argument/1" title="Argument题集" alt="Argument题集" class="enter-btn">Argument题集</a>
        <a href="/vsingle/1" title="文字推理单选题" alt="文字推理单选题" class="enter-btn">文字推理单选题</a>
        <a href="/vmult/1" title="文字推理多选题" alt="文字推理多选题" class="enter-btn">文字推理多选题</a>
        <a href="/vlogic/1" title="文字推理逻辑题" alt="文字推理逻辑题" class="enter-btn">文字推理逻辑题</a>
        <a href="/vreading/1" title="文字推理阅读题" alt="文字推理阅读题" class="enter-btn">文字推理阅读题</a>
        <a href="/qcompare/1" title="数量推理比较题" alt="数量推理比较题" class="enter-btn">数量推理比较题</a>
        <a href="/qselect/1" title="数量推理选择题" alt="数量推理选择题" class="enter-btn">数量推理选择题</a>
        <a href="/qinput/1" title="数量推理填空题" alt="数量推理填空题" class="enter-btn">数量推理填空题</a>
    </div>
{/block}