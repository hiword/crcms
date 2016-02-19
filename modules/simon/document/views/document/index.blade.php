@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('static/document/css.css')}}" />
@endsection
@section('body')
<div class="container-fluid">
	<div class="row">
		@include('front.skin1.layout.document-left')
		<div class="col-md-9">
			<div class="g-header" style="margin-top: 60px;">
				<h1>文章</h1>
			 	<h3>优秀的文章可以使人受益非浅</h3>
			</div>
			<div class="article-list">
				<!-- 
				 style="background: #FFFFFF;"
				<article style="padding-bottom:0px;margin-bottom:0px;">
					<h1>文章</h1>
					<h3>优秀的文章可以使人受益非浅</h3>
				</article>
				 -->
				@foreach($models as $key=>$model)
				<article><!--  {!!$key==0 ? 'style="margin-top:0px;"' : null!!} -->
					<div class="date-title mt20">{{format_date($model->created_at,1)}}</div>
					<h2 class="entry-title">
						<a title="{{$model->title}}" href="{{url('/'.$model->id)}}">{{$model->title}}</a>
					</h2>
					<div class="content">
						@if($model->hasOneDocumentData)
						{!!$model->hasOneDocumentData->interceptContent()!!}
						@endif
						<p class="text-right"><a href="{{url('/'.$model->id)}}" style="color:#b3b3b3">阅读全文</a></p>
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
				@endforeach
			</div>
			<div class="mt0">&nbsp;</div>
			<div class="page">{!!$page!!}</div>
		</div>
	</div>
</div>
@include('front.skin1.layout.footer')
@endsection