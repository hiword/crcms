@extends('front.skin1.layout.layout')
@section('title')
标签云 - @parent
@endsection
@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('static/tag/css/tag.css')}}" />
@endsection
@section('body')
@parent
<div class="jumbotron">
	<div class="container">
		  <h1>标签</h1>
		  <p>标签是最有效的内容组织形式，正确的使用标签能更快的发现和解决你的问题</p>
  	</div>
</div>
<div class="container">
	<div class="row">
		@foreach($models as $key=>$model)
		<div class="col-md-3 {{($key+1)%4==0 ? 'last' : null}} mb20">
			<div class="tag-list">
				<p class=""><a href="{{url('tags/'.$model->name)}}" class="b title">{{$model->name}}</a></p>
				<div class="info">{{$model->hasOneTagContent->content}}</div>
			</div>
		</div>
		@endforeach
	</div>
	<ul class="pagination">{!!$page!!}</ul>
</div>
@endsection
@section('script')
@parent
<script>
// $(function(){
// 	$.get('{{url("tags")}}',function(data){
// 		console.log(data);
// 	});
// });
</script>
@endsection