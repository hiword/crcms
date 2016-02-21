@extends('front.skin1.layout.layout')
@section('title')
添加标签 - @parent
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
	@include('layout.alert')
	<form action="{{url('tags/store')}}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}" />
		<div class="form-group">
			<input type="text" placeholder="标签名" name="name" class="form-control" />
			<p class="help-block"></p>
		</div>
		<div class="form-group">
			<textarea name="content" placeholder="标签详述" class="form-control"></textarea>
			<p class="help-block"></p>
		</div>
		<div class="form-group">
		<button type="submit" class="btn btn-success">Submit</button>
		</div>
	</form>
</div>
@endsection
