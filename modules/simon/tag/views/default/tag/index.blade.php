@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('vendor/1/css/style.css')}}" />
@endsection
@section('body')

@include('document::default.includes.header')
<!-- div, box -->
<div class="main-box container">
	<div class="row list-box">
		@foreach($models as $key=>$model)
		<div class="col-md-2 {{($key+1)%4==0 ? 'last' : null}} mb20">
			<div class="tag-list">
				<p class=""><a href="{{url('tags/'.$model->name)}}" class="b title">{{$model->name}}<small>&nbsp;({{$model->count}})</small></a></p>
				<?php /*
				<div class="info">{{$model->hasOneTagContent->content}}</div>
				*/?>
			</div>
		</div>
		@endforeach
	</div>
	<div class="page">{!!$page!!}</div>
</div>
@include('document::default.includes.footer')
@endsection

@section('script')
@parent
@endsection

