{extends file="lib/framework/base_fw.html"}

{block name="title"}  - 关于我们{/block}

{block name="meta"}<meta name="robots" content="noindex, nofollow" />{/block}

{block name="currentAU"} class="nav-active"{/block}

{block name="container"}
<div class="layout grid-s190m0">
    <div class="col-main">
        <div class="main-wrap help" id="J_help-section">
            <section class="about-us">
                <p>爱GRE模考网(<a href="http://www.igrer.com/">www.igrer.com</a>)的宗旨是“帮G友们轻松搞定新G”。</p>
                <p>爱GRE模考网采用智能化搜索引擎，从互联网抓取各类题目，通过人工刷选入库，保证题目的质量。</p>
                <p>G友们来到这不仅能够通过在线模考提供个人的应试能力，而且可以结识更多的朋友，共同提高进步。</p>
                <p>有了爱GRE模考网，非计算机专业的同学不再需要安装坑爹的POWERPREP II软件了(需要安装java虚拟机)。</p>
                <p>除此之外，我们还将定期邀请GRE名师给各位童鞋讲解新GRE的应试技巧。</p>
                <p>总之，出于帮助饱受新GRE折磨的童鞋以最快捷，最轻松的方式搞定新G，我们建立了爱GRE模考网。</p>
            </section>
            <section class="cooperation hide">
                <ul>
                    <li>联系人：谭先生</li>
                    <li>Email：gbtan1988@gmail.com</li>
                    <li>QQ：445855631</li>
                </ul>
            </section>
            <section class="links hide">
                <h2>友情链接</h2>
                <ul class="site-link-list">
                    <li><a href="http://www.ets.org/">ETS官网</a></li>
                    <li><a href="http://www.taisha.org/">太傻网</a></li>
                    <li><a href="http://gter.ce.cn/">寄托天下</a></li>
                    <li><a href="http://www.etest.net.cn/">教育部考试中心海外考试报名信息网</a></li>
                    <li><a href="http://www.gmajor.net/awp/">AWP官方主页</a></li>
                    <li><a href="http://www.nytimes.com/">The New York Times</a></li>
                    <li><a href="http://www.washingtonpost.com/">Washington Post</a></li>
                    <li><a href="http://online.wsj.com/">The Wall Street Journal</a></li>
                </ul>
            </section>
            <section class="announce hide">
                <p class="noindent">在接受爱GRE模考网服务之前，请您务必仔细阅读并透彻理解本声明。<br>无论您采取何种方式登陆或使用爱GRE模考网的服务和数据，都将视作您对本声明全部内容的认可。</p>
                <b>第一部分</b>
                <p>鉴于爱GRE模考网的所有题目素材全部来源于互联网或由网友提供，本站不做任何形式的保证：不保证题目及题目答案的准确性，不保证题目素材来源的合法性。因使用爱GRE模考网而可能遭致的意外、疏忽、侵权及其造成的损失，本站对其概不负责，亦不承担任何法律责任。</p>
                <b>第二部分</b>
                <p>爱GRE模考网仅为用户发布的内容提供存储空间，爱GRE模考网不对用户发表、转载的内容提供任何形式的保证：不保证内容满足您的要求，用户在爱GRE模考网发表的内容仅表明其个人的立场和观点，并不代表爱GRE模考网的立场或观点。</p>
                <p>作为题目素材的提供者，需自行对所提供的题目素材负责，因所提供的题目素材引发的一切纠纷，由该题目素材的提供者承担全部法律及连带责任。爱GRE模考网不承担任何法律及连带责任。</p>
                <p>用户在爱GRE模考网发布侵犯他人知识产权或其他合法权益的内容，爱GRE模考网有权予以删除，并保留移交司法机关处理的权利。</p>
                <p>个人或单位如认为爱GRE模考网上存在侵犯自身合法权益的内容，应准备好具有法律效应的证明材料，及时与爱GRE模考网取得联系，以便爱GRE模考网迅速做出处理。</p>
                <p>对免责声明的解释、修改及更新权均属于爱GRE模考网所有。</p>
                <p>联系方式：<a href="mailto:gbtan1988@gmail.com">gbtan1988@gmail.com</a></p>
            </section>
        </div>
    </div>
    <div class="col-sub">
        <ul class="help-nav cf" id="J_help-nav">
            <li class="current"><a title="关于我们" href="#aboutus">关于我们</a></li>
            <li><a title="商务合作" href="#cooperation">商务合作</a></li>
            <li><a title="友情链接" href="#links">友情链接</a></li>
            <li><a title="免责声明" href="#announce">免责声明</a></li>
        </ul>
    </div>
{/block}

{block name="foot"}
<script type="text/javascript">
(function () {
    var helpSections = $('#J_help-section').children(),
        nav = $('#J_help-nav'),
        hashes = ['#aboutus', '#cooperation', '#links', '#announce'];
    $.each($('#J_help-nav li'), function (idx, ele) {
        $(ele).click(function (evt) {
            $(ele).siblings().removeClass('current');
            $(ele).addClass('current');
            helpSections.hide().eq(idx).show();
            location.hash = hashes[idx];
            return false;
        });
    });
    switch(location.hash) {
        case hashes[0]:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
            break;
        case hashes[1]:
            helpSections.hide().eq(1).show();
            nav.children().removeClass('current').eq(1).addClass('current');
            break;
        case hashes[2]:
            helpSections.hide().eq(2).show();
            nav.children().removeClass('current').eq(2).addClass('current');
            break;
        case hashes[3]:
            helpSections.hide().eq(3).show();
            nav.children().removeClass('current').eq(3).addClass('current');
            break;
        default:
            helpSections.hide().eq(0).show();
            nav.children().removeClass('current').eq(0).addClass('current');
    }
}) ();
</script>
{/block}

{block name="footer"}{/block}