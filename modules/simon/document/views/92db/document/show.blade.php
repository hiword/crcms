@extends('document::92db.layout')

@section('meta')
@parent
<meta name="keywords" content="{{$model->seo_keyword}}" />
<meta name="description" content="{{$model->seo_intro}}"/>
@endsection

@section('main-box')
<article class="article-list mb20">	
	 <div class="list-info row">
		<div class="user-info col-md-4 col-xs-12 mb10">
			<a rel="nofollow"  href="###">
				<img alt="" class="img-circle" width="35" src="http://pic.qiushibaike.com/system/avtnew/2782/27825408/medium/20160331225958.jpg">
			</a>
			<a rel="nofollow" class="ml5" href="###">
				92doubi
			</a>
		</div>
		<div class="other col-md-8 col-xs-12 text-right">
			@foreach($tags as $tag)
			<a href="{{url('tags/search')}}?name={{$tag->name}}" class="tag ml5"><i class="glyphicon glyphicon-tag"></i>{{$tag->name}}</a>
			@endforeach
		</div>
	</div> 
	<div class="list-content">
		<div>
			@if(isset($model->hasOneDoubiData->content))
			{!! nl2br($model->hasOneDoubiData->content) !!}
			@endif	
		</div>
		@if($model->picture)
		<?php /*
		<span class="loading">
			<img status="small" original-src="{{img_url($document->thumbnail)}}" data-original="{{img_url($document->thumbnail)}}" class="lazy img-responsive mt10" src="{{img_url($document->thumbnail,'92db')}}" small-src="{{img_url($document->thumbnail,'92db')}}" />
			<div class="loading-img">1fdsafdsa</div>
		</span>
		*/?>
		<span class="photoBox">
			<div class="loadingBox">
				<span class="loading"></span>
			</div><!-- loading-img lazy  -->
			<img status="small" alt="{{$model->seo_title}}" original-src="{{img_url($model->picture)}}" data-original="{{img_url($model->picture)}}" class="img-responsive mt10" src="{{img_url($model->picture)}}" small-src="{{img_url($model->picture,'92db')}}" />
		</span><!--photoBox end-->
		@endif
	</div>
	<div class="list-status mt20 clearfix">
		<a href="###" class="gb-count" type="good" count-id="{{$model->id}}"><i class="glyphicon glyphicon-thumbs-up mr5"></i><span class="show-good">{{$good or '0'}}</span></a>
		<a href="###" class="gb-count" type="bad" count-id="{{$model->id}}"><i class="glyphicon glyphicon-thumbs-down ml10 mr5"></i><span class="show-bad">{{$bad or '0'}}</span></a>
		<a href="###"><i class="glyphicon glyphicon-comment ml10 mr5"></i><?php echo mt_rand(50,150)?></a>
	</div>
</article>
@endsection
