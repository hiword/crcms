@extends('layout.layout')

@section('style')
<link rel="stylesheet" href="{{static_asset('vendor/skin1/css/basic.css')}}" />
@endsection
@section('title')
{{$model->title}} - crcms
@endsection

@section('meta')
<meta content="{{$model->hasOneDocumentData->keyword or null}}" name="keywords">
<meta content="{{$model->hasOneDocumentData->intro or null}}" name="description">
@endsection

@section('body')
<div class="container-fluid">
	<div class="row">
		@include('document::skin1.includes.left')
		<div class="main-right col-md-9 main-right col-md-offset-3">
			<div class="main-box">
				<div class="row">
					<div class="col-md-9 document-show">
						<h1 class="title text-center">{{$model->title}}</h1>
						<div class="article-info mt10 mb10 text-center">
							<span>
								<i class="glyphicon glyphicon-calendar"></i>
								{{format_date($model->created_at)}}
							</span>
							<span class="ml5">
								<i  class="glyphicon glyphicon-comment"></i>
								<span  class="ds-thread-count" data-replace="1" data-thread-key="2171">2</span>
							</span>
							<span class="ml5">
								<i class="glyphicon glyphicon-eye-open"></i>
								5555
							</span>
							<span class="ml5"  ng-repeat="tag in tags">
								@foreach($model->morphToManyTag as $tag)
								<a href="###" class="tags"><i class="glyphicon glyphicon-tag"></i>&nbsp;{{$tag->name}}</a>
								@endforeach
							</span>
						</div>
						<div class="main-content">
							{!!$model->hasOneDocumentData->content or null!!}
						</div>
					</div>
					<div class="col-md-3">
					
					</div>
				</div>
			</div>
			@include('document::skin1.includes.footer')
		</div>
	</div>
</div>
@endsection

