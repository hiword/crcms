@extends('layout.layout')

@section('style')
<link rel="stylesheet" href="{{static_asset('vendor/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{static_asset('vendor/skin1/css/basic.css')}}" />
<link rel="stylesheet" href="{{static_asset('vendor/comments/comment.css')}}" />
@endsection
@section('title')
{{$model->title}} - crcms
@endsection

@section('meta')
<meta content="{{$model->hasOneDocumentData->keyword or null}}" name="keywords">
<meta content="{{$model->hasOneDocumentData->intro or null}}" name="description">
@endsection

@section('body')
<div class="container-fluid">
	<div class="row">
		@include('document::skin1.includes.left')
		<div class="main-right col-md-9 main-right col-md-offset-3">
			<div class="main-box">
				<div class="row">
					<div class="col-md-9 document-show">
						<h1 class="title text-center">{{$model->title}}</h1>
						<div class="article-info mt10 mb10 text-center">
							<span>
								<i class="glyphicon glyphicon-calendar"></i>
								{{format_date($model->created_at)}}
							</span>
							<span class="ml5">
								<i  class="glyphicon glyphicon-comment"></i>
								<span  class="ds-thread-count" data-replace="1" data-thread-key="2171">2</span>
							</span>
							<span class="ml5">
								<i class="glyphicon glyphicon-eye-open"></i>
								{{$count}}
							</span>
							<span class="ml5"  ng-repeat="tag in tags">
								@foreach($model->morphToManyTag as $tag)
								<a href="{{url('tags/search')}}?name={{$tag->name}}" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
								@endforeach
							</span>
						</div>
						<div class="main-content" id="myArticle">
						@if($model->hasOneDocumentData->content)
							{!!str_replace('_ueditor_page_break_tag_',null,$model->hasOneDocumentData->content)!!}
						@endif
						</div>
						<!-- comments -->
						<div id="show-comment"></div>
						<div id="show-comment-list"></div>
					</div>
					<div class="col-md-3 sidebar">
						<div class="panel">
							<div class="panel-heading"><h3 class="content-index">文章目录</h3></div>
							<div class="panel-body">
								<div id="toc"></div>
							</div>
						</div>
						<div class="panel">
							<div class="panel-heading"><h3 class="content-index">热门标签</h3></div>
							<div class="panel-body">
								@tag('hot')
								<a href="{{url('tags/search')}}?name={{$tag->name}}" class="sidebar-tag">{{$tag->name}} ({{$tag->count_num}})</a>
								@endtag
							</div>
						</div>
					</div>
				</div>
			</div>
			@include('document::skin1.includes.footer')
		</div>
	</div>
</div>
@endsection

@section('script')
@parent
<script src="{{static_asset("vendor/toc/toc.min.js")}}"></script>
<script src="{{static_asset("vendor/common/js/jQuery.autoIMG.min.js")}}"></script>
<script src="{{static_asset("vendor/comments/comment.js")}}"></script>
<script>
$('#myArticle').autoIMG();
$('#toc').toc({
    'selectors': 'h2,h3,h4', //elements to use as headings
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
//comments
$(function(){
	$.get('{{url("comment/create")}}?type={{rawurlencode("Simon\Document\Models\Document")}}&out_id={{$model->id}}',{},function(data){
		$('#show-comment').html(data);
	});
	$.get('{{url("comment/index")}}?type={{rawurlencode("Simon\Document\Models\Document")}}&out_id={{$model->id}}',{},function(data){
		$('#show-comment-list').html(data);
	});
})
</script>
@endsection

