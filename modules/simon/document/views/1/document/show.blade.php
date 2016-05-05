@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('vendor/1/css/style.css')}}" />
@endsection
@section('body')

@include('document::default.includes.header')
<!-- div, box -->
<div class="main-box container">
	<div class="row">
		<div class="col-md-9 show-content">
			<h1>{{$model->title}}</h1>
			<div class="info">
				@foreach($categories as $category)
				<a class="categories" href="{{url('/'.$category->id)}}">{{$category->name}}</a>
				@endforeach
				@foreach($model->morphToManyTag as $tag)
				<a href="###" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
				@endforeach
				&nbsp;&nbsp;<span>{{format_date($model->created_at)}}</span>
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
			<div class="panel panel-default panel-list">
			 	 <div class="panel-heading">视频链接</div>
				  <div class="panel-body text-center">
				    	<a href="###" target="_blank" class="btn btn-danger btn-block">点击下载</a>
				    	<p class="download-link">download-link</p>
				  </div>
			</div>
			<div class="panel panel-default panel-list">
			 	 <div class="panel-heading">最近更新</div>
				  <div class="panel-body">
				  	<ul class="media-list">
					@foreach($lists as $list)
					  <li class="media">
					  	@if($list->thumbnail)
					    <div class="media-left">
					      <a href="{{url('show/'.$list->id)}}">
					        <img class="media-object" width="100" height="55" src="{{template_img_src('sidebar',$list->thumbnail)}}">
					      </a>
					    </div>
					    @endif
					    <div class="media-body">
					      <h4 class="media-heading"><a href="{{url('show/'.$list->id)}}">{{$list->title}}</a></h4>
					    </div>
					  </li>
					  @endforeach
					</ul>
				  </div>
			</div>
		</div>
	</div>
	
</div>
@include('document::default.includes.footer')
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