@extends('layout.front-layout')
@section('style')
@section('meta')
<title>{{$model->title}}</title>
<meta name="keywords" content="{{$model->hasOneDocumentData->seo_keywords}}" />
<meta name="description" content="{{$model->hasOneDocumentData->seo_description}}" />
@endsection
@parent
<link rel="stylesheet" href="{{static_asset('static/document/css.css')}}" />
@endsection

@section('body')
<div class="container-fluid">
	<div class="row">
		@include('front.skin1.layout.document-left')
		<div class="col-md-9">
			<div class="article-list">
				<article>
					<div class="date-title mt20">{{format_date($model->created_at,1)}}</div>
					<h2 class="entry-title">
						<a title="{{$model->title}}" href="{{url('/'.$model->id)}}">{{$model->title}}</a>
					</h2>
					<div class="content">
						{!!str_replace('_ueditor_page_break_tag_','',$model->hasOneDocumentData->content)!!}
					</div>
					<ul class="meta">
						<li>
							<span>分类</span>
							@foreach($model->belongsToManyCategory as $_category)
							<a rel="category" href="###">{{$_category->name}}</a>
							@endforeach
						</li>
						<li>
							<span>标签</span>
							@foreach($model->morphToManyTag as $_tag)
							<a rel="tag" href="###">{{$_tag->name}}</a>
							@endforeach
						</li>
					</ul>
				</article>
				<!-- 多说评论框 start -->
				<div class="ds-thread" data-thread-key="{{$model->id}}" data-title="{{$model->title}}" data-url="{{url('/'.$model->id)}}"></div>
			<!-- 多说评论框 end -->
			<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
			<script type="text/javascript">
			var duoshuoQuery = {short_name:"crcms"};
				(function() {
					var ds = document.createElement('script');
					ds.type = 'text/javascript';ds.async = true;
					ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
					ds.charset = 'UTF-8';
					(document.getElementsByTagName('head')[0] 
					 || document.getElementsByTagName('body')[0]).appendChild(ds);
				})();
				</script>
			<!-- 多说公共JS代码 end -->
			</div>
			<div class="mt0">&nbsp;</div>
		</div>
	</div>
</div>
@include('front.skin1.layout.footer')
@endsection