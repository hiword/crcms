@extends('document::default.document-layout')
@section('style')
@parent
<!-- 
<link type="text/css" rel="stylesheet" href="{{static_asset("vendor/tocify/src/stylesheets/jquery.tocify.css")}}" />
 -->
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
              <span class="meta">{{format_date($model->created_at)}}</span></div>
          </div>
        </div>
      </div></div>
    </header>
    
    <div id="main" class="container main">
      <div class="row">
        <div id="myArticle" class="col-lg-9 col-md-9 col-sm-9">
          <div class="post-area post">
            <article>
            {!!$model->hasOneDocumentData->content or null!!}
            </article>
            <hr></div>
        </div>
        <div id="" class="col-lg-3 col-md-3 col-sm-3">
          <div id="myAffix" class="shadow-bottom-center hidden-xs">
            <div class="categories-list-header">文章目录</div>
            <div class="content-text-" id="toc">fdasfadsfas</div>
          </div>
        </div>
        <hr>
        <!-- Post Container -->
        <div class="col-lg-9 col-md-9 col-sm-9 sidebar-container">
          <ul class="pager">
            <li class="previous">
            	@prev(app('request')->input('id'))
              <a href="{{empty($prev) ? '###' : url('show/'.$prev->id)}}" data-toggle="tooltip" data-placement="top" title="{{$prev->title or null}}">&larr; 上一篇</a></li>
            
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
	            @tag
	            <a href="{{url('tags/search')}}?name={{$tag->name}}" title="{{$tag->name}}" rel="1">{{$tag->name}}</a>
	            @endtag
          </section>
          <!-- Friends Blog -->
          <hr>
          <h5>友情链接</h5>
          <ul class="list-inline">
          	<a id="friend-tag" href="http://crcms.cn/">
                crcms
              </a>
          </ul>
        </div>
      </div>
    </div>
@endsection

@section('script')
@parent
<?php /*
<script src="{{static_asset("vendor/tocify/src/javascripts/jquery.tocify.min.js")}}"></script>
<script>
$(function(){
	$('#toc').tocify();
})
</script>*/?>
<script src="{{static_asset("vendor/toc/toc.min.js")}}"></script>
<script>
$('#toc').toc({
    'selectors': 'h2,h3', //elements to use as headings
    'container': '#myArticle', //element to find all selectors in
    'smoothScrolling': true, //enable or disable smooth scrolling on click
    'prefix': 'toc', //prefix for anchor tags and class names
    'onHighlight': function(el) {}, //called when a new section is highlighted 
    'highlightOnScroll': true, //add class to heading that is currently in focus
    'highlightOffset': 100, //offset to trigger the next headline
    'anchorName': function(i, heading, prefix) { //custom function for anchor name
        return prefix+i;
    },
    'headerText': function(i, heading, $heading) { //custom function building the header-item text
        return $heading.text();
    },
'itemClass': function(i, heading, $heading, prefix) { // custom function for item class
  return $heading[0].tagName.toLowerCase();
}
});
</script>
@endsection

