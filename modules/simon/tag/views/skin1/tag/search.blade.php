@extends('layout.layout')

@section('style')
<link rel="stylesheet" href="{{static_asset('vendor/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{static_asset('vendor/skin1/css/basic.css')}}" />
@endsection
@section('title')
CRCMS - 致力于打造全面化的开源CMS - 标签:{{$tag->name}}
@endsection

@section('meta')
<meta content="{{$tag->name}}" name="keywords">
@endsection

@section('body')
<div class="container-fluid">
	<div class="row">
		@include('document::skin1.includes.left')
		<div class="main-right col-md-9 main-right col-md-offset-3">
			<div class="main-box">
				<h1>标签：{{$tag->name}}</h1>
				@foreach($models as $document)
				<article>
					<a class="title" href="{{url('show/'.$document->id)}}">{{$document->title}}</a>
					<div class="article-info mt10 mb10">
						<span>
							<i class="glyphicon glyphicon-calendar"></i>
							{{format_date($document->created_at)}}
						</span><?php /*
						<span class="ml5">
							<i  class="glyphicon glyphicon-comment"></i>
							<span  class="ds-thread-count" data-replace="1" data-thread-key="2171">2</span>
						</span>
						<span class="ml5">
							<i class="glyphicon glyphicon-eye-open"></i>
							{{$document->count}}
						</span>
						
						<span class="ml5"  ng-repeat="tag in tags">
							@foreach($document->tags as $tag)
							<a href="###" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
							@endforeach
						</span>*/?>
					</div>
					<div class="content">{!!$document->hasOneDocumentData->interceptContent()!!}</div>
				</article>
				@endforeach
				<?php /*
				<div class="page">{{$page}}</div>
				*/?>
				</div>
				@include('document::skin1.includes.footer')
			</div>
	</div>
</div>
@endsection

