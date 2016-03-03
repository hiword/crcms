@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('static/1/css/style.css')}}" />
@endsection
@section('body')

@include('includes.skin1.header')
<!-- div, box -->
<div class="main-box container">
	<div class="row">
		<div class="col-md-9 show-content">
			<h1>{{$model->title}}</h1>
			<div class="info">
				@foreach($model->morphToManyTag as $tag)
				<a href="###" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
				@endforeach
			</div>
			<div>
				{{$model->hasOneDocumentContent->content or null}}
			</div>
			<div class="images">
				@foreach($model->morphManyImages as $image)
					<p>
						<img src="{{$image->path}}" alt="" />
					</p>
				@endforeach
			</div>
		</div>
		<div class="col-md-3 right-box">
			<div class="panel panel-default">
			 	 <div class="panel-heading">视频链接</div>
				  <div class="panel-body">
				    	<a href="###" target="_blank" class="btn btn-danger">点击下载</a>
				    	<p class="downlink">btn-danger</p>
				  </div>
			</div>
			<div class="panel panel-default">
			 	 <div class="panel-heading">热门推荐</div>
				  <div class="panel-body">
				  	<ul class="ul-list">
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  		<li><a href="###">技巧裁夺鞯震荡载朝秦暮楚</a></li>
				  	</ul>
				  </div>
			</div>
		</div>
	</div>
	
</div>
@include('includes.skin1.footer')
@endsection

@section('script')
@parent
<script src="{{static_asset('vendor/org/jQuery.autoIMG.min.js')}}"></script>
<script>
$(function(){
	$('.show-content').autoIMG();
})
</script>
@endsection