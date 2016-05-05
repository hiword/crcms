@extends('document::default.document-layout')
@section('style')
@parent
<link type="text/css" rel="stylesheet" href="{{static_asset("vendor/tocify/src/stylesheets/jquery.tocify.css")}}" />
@endsection
    @section('body')
    
    <!-- Page Header -->
    <style type="text/css">header.intro-header{ background-image: url('http://7xq2ld.com1.z0.glb.clouddn.com/blog%2Fpost-img%2Fgirls.jpg?imageView2/1/w/1920/h/500') }</style>
    
    <header class="intro-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-heading">
              <div class="tags">
              	@foreach($model->morphToManyTag as $tag)
				<a href="###" class="tag">{{$tag->name}}</a>
				@endforeach
              <h1>{{$model->title}}</h1>
              <span class="meta">Posted by Zebulon on {{format_date($model->created_at)}}</span></div>
          </div>
        </div>
      </div></div>
    </header>
    
    <div id="main" class="container main">
      <div class="row">
        <div id="myArticle" class="col-lg-9 col-md-9 col-sm-9">
          <div class="post-area post">
            <article>
              <ul id="markdown-toc">
                <li>
                  <a href="#section" id="markdown-toc-section">前言</a></li>
                <li>
                  <a href="#git" id="markdown-toc-git">Git的基本操作</a>
                  <ul>
                    <li>
                      <a href="#section-1" id="markdown-toc-section-1">设置用户名和邮箱</a></li>
                    <li>
                      <a href="#git-1" id="markdown-toc-git-1">Git命令帮助</a></li>
                    <li>
                      <a href="#section-2" id="markdown-toc-section-2">常用命令</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#section-3" id="markdown-toc-section-3">参考资源</a></li>
              </ul>
              <h2 id="section">前言</h2>
              <p>由于工作原因，之前一直用的是svn，由于某些原因接触了git，之后就深深地喜欢了git。目前git托管的网站也非常的多。譬如
                <a href="http://www.github.com">github</a>、国内的
                <a href="http://www.coding.net">coding</a>、
                <a href="http://www.GitCafe.com">GitCafe</a>;目前也是在慢慢熟悉git的一些功能，特此将自己常用的一些命令和遇到的一些问题记录在这篇blog里，希望和小白一起学习。</p>
              <h2 id="git">Git的基本操作</h2>
              <h3 id="section-1">设置用户名和邮箱</h3>
              <ol>
                <li>
                  <p>设置用户名
                    <br />
                    <code>git config user.name "Your Name"</code>
                    <br />
                    <code>git config --global user.name "Your Name"</code></p>
                </li>
                <li>
                  <p>设置用户邮箱
                    <br />
                    <code>git config user.email "demo@test.com"</code>
                    <br />
                    <code>git config --global user.email "demo@test.com"</code></p>
                </li>
                <li>
                  <p>查看设置
                    <br />
                    <code>git config --list</code></p>
                </li>
              </ol>
              <h3 id="git-1">Git命令帮助</h3>
              <p>通过
                <code>git help</code>来获取命令帮助
                <br />通过
                <code>git help 特定cmd</code>获取特定指定的帮助</p>
              <h3 id="section-2">常用命令</h3>
              <ol>
                <li>克隆项目
                  <code>git clone URL</code></li>
                <li>添加文件
                  <code>git add *</code></li>
                <li>查看状态
                  <code>git status</code></li>
                <li>提交代码
                  <code>git commit -m "打标内容"</code></li>
                <li>向远程仓库推送代码
                  <code>git push</code></li>
                <li>从远程仓库下载代码
                  <code>git pull</code></li>
                <li>部署时经常会遇到，远程版本与本地冲突，需要用远程版本覆盖本地版本。则执行
                  <br />
                  <code>git reset --hard</code>
                  <br />
                  <code>git pull</code></li>
              </ol>
              <h2 id="section-3">参考资源</h2>
              <ol>
                <li>
                  <a href="http://www.liaoxuefeng.com/wiki/0013739516305929606dd18361248578c67b8067c8c017b000/">廖雪峰git教程</a></li>
                <li>
                  <a href="http://www.bootcss.com/p/git-guide/">boot-css-git教程</a></li>
                <li>
                  <a href="https://coding.net/help/faq/git/git.html">coding-git教程</a></li>
              </ol>
            </article>
            <hr></div>
        </div>
        <div id="content" class="col-lg-3 col-md-3 col-sm-3">
          <div id="myAffix" class="shadow-bottom-center hidden-xs">
            <div class="categories-list-header">文章目录</div>
            <div class="content-text-" id="toc"></div>
          </div>
        </div>
        <hr>
        <!-- Post Container -->
        <div class="col-lg-9 col-md-9 col-sm-9 sidebar-container">
          <ul class="pager">
            <li class="previous">
              <a href="2016/01/21/tool-of-create-blog/" data-toggle="tooltip" data-placement="top" title="写博客常用工具 @Jekyll">&larr; 上一篇</a></li>
            <li class="next">
              <a href="2016/01/17/xbmc-on-raspberryPi/" data-toggle="tooltip" data-placement="top" title="XBMC on Raspberry Pi">下一篇 &rarr;</a></li>
          </ul>
        </div>
        <!-- Sidebar Container -->
        <div class="col-lg-9 col-md-9 col-sm-9 sidebar-container">
          <!-- Featured Tags -->
          <section>
            <hr class="hidden-sm hidden-xs">
            <h5>
              <a href="tags/">常用标签</a></h5>
            <div class="tags">
              <a href="tags/#生活" title="生活" rel="1">生活</a>
              <a href="tags/#jekyll" title="jekyll" rel="3">jekyll</a>
              <a href="tags/#树莓派" title="树莓派" rel="1">树莓派</a>
              <a href="tags/#git" title="git" rel="1">git</a>
              <a href="tags/#科学上网" title="科学上网" rel="2">科学上网</a>
              <a href="tags/#电路" title="电路" rel="1">电路</a>
              <a href="tags/#OSX" title="OSX" rel="1">OSX</a>
              <a href="tags/#踏青" title="踏青" rel="1">踏青</a></div>
          </section>
          <!-- Friends Blog -->
          <hr>
          <h5>友情链接</h5>
          <ul class="list-inline">
            <li>
              <a id="friend-tag" href="http://www.csoneplus.com/">中安亿嘉科技</a></li>
            <li>
              <a id="friend-tag" href="http://micrortl.com/">MicroRTL</a></li>
            <li>
              <a id="friend-tag" href="https://laravist.com">For Laravel Artist</a></li>
          </ul>
        </div>
      </div>
    </div>
@endsection

@section('script')
@parent
<script src="{{static_asset("vendor/tocify/src/javascripts/jquery.tocify.min.js")}}"></script>
<script>
$(function(){
	$('#toc').tocify();
})
</script>
@endsection

