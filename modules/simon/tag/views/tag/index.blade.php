@extends('layout.front-layout')
@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('static/document/css.css')}}" />
<link rel="stylesheet" href="{{static_asset('static/tag/css/tag.css')}}" />
@endsection
@section('body')
<div class="container-fluid">
	<div class="row">
		@include('front.skin1.layout.document-left')
		<div class="col-md-9">
			<div class="article-list">
				<div class="g-header" style="margin-top: 60px;">
					<h1>标签</h1>
					<h3>正确的使用标签能更快的发现和解决你的问题</h3>
				</div>
				<article>
		  		<div class="row mt30">
				  	@foreach($models as $key=>$model)
					<div class="col-md-3 {{($key+1)%4==0 ? 'last' : null}} mb20">
						<div class="tag-list">
							<p class=""><a href="{{url('tags/'.$model->name)}}" class="b title">{{$model->name}}</a></p>
							<?php /*
							<div class="info">{{$model->hasOneTagContent->content}}</div>
							*/?>
						</div>
					</div>
					@endforeach
				</div>
		  		</article>
		  	</div>
		  	<div class="mt0 clearfix">&nbsp;</div>
			<div class="page">{!!$page!!}</div>
		</div>
	</div>
</div>
@include('front.skin1.layout.footer')
@endsection