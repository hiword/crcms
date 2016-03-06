@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('static/1/css/style.css')}}" />
@endsection
@section('body')

@include('includes.skin1.header')
<!-- div, box -->
<div class="main-box container">
	<div class="row list-box">
		@foreach($models as $model)
		<div class="col-md-4">
			<div class="thumbnail">
				<img src="{{$model->thumbnail}}" alt="" width="100%" />
				<div class="content-box2">
					<a href="{{url('show/'.$model->id)}}" class="title">{{$model->title}}</a>
					<div class="info-box clearfix">
						@foreach($model->morphToManyTag as $tag)
						<a href="###" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
						@endforeach
						<span>
							<a href="###" class="icon-play"><i class="glyphicon glyphicon-triangle-right"></i></a>
							{{mt_rand(500,3000)}}次
						</span>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="page">{{$page}}</div>
</div>
@include('includes.skin1.footer')
@endsection

@section('script')
@parent
<script>
$(function(){
	$('.thumbnail').on('mouseover',function(){
		$(this).find('.content-box2').width($(this).find('img').width()).show();
	});
	$('.thumbnail').on('mouseout',function(){
		$(this).find('.content-box2').hide();
	});
})
</script>
@endsection