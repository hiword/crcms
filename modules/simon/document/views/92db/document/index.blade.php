@extends('document::92db.layout')


@section('main-box')
@document('doubi',$cid)
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
			@foreach($document->tags as $tag)
			<a href="{{url('tags/search')}}?name={{$tag->name}}" class="tag ml5"><i class="glyphicon glyphicon-tag"></i>{{$tag->name}}</a>
			@endforeach
		</div>
	</div> 
	<div class="list-content">
		<div>
			@if(isset($document->hasOneDoubiData->content))
			{!! nl2br($document->hasOneDoubiData->content) !!}
			<span class="ml10"></span>
			@endif	
			<a href="{{route('doubi_detail',['did'=>$document->id])}}" title="{{$document->seo_title}}"  class="">查看全文</a>
		</div>
		@if($document->picture)
		<!-- 
		<span class="loading">
			<img status="small" original-src="{{img_url($document->thumbnail)}}" data-original="{{img_url($document->thumbnail)}}" class="lazy img-responsive mt10" src="{{img_url($document->thumbnail,'92db')}}" small-src="{{img_url($document->thumbnail,'92db')}}" />
			<div class="loading-img">1fdsafdsa</div>
		</span>
		-->
		<span class="photoBox">
			<div class="loadingBox">
				<span class="loading"></span>
			</div>
			<img status="small" alt="{{$document->seo_title}}" original-src="{{img_url($document->picture)}}" data-original="{{img_url($document->picture)}}" class="loading-img lazy img-responsive mt10" src="{{img_url($document->picture,'92db')}}" small-src="{{img_url($document->picture,'92db')}}" />
		</span><!--photoBox end-->
		@endif
	</div>
	<div class="list-status mt20 clearfix">
		<a href="###"><i class="glyphicon glyphicon-thumbs-up mr5"></i><?php echo mt_rand(200,3000)?></a>
		<a href="###"><i class="glyphicon glyphicon-thumbs-down ml10 mr5"></i><?php echo mt_rand(200,3000)?></a>
		<a href="###"><i class="glyphicon glyphicon-comment ml10 mr5"></i><?php echo mt_rand(50,150)?></a>
	</div>
</article>
@enddocument
<!-- page -->
<div class="page mb20">
	{{$page}}
	<!-- 
	<ul class="pagination pagination-lg">
	    <li>
	      <a href="#" aria-label="Previous">
	        <span aria-hidden="true">&laquo;</span>
	      </a>
	    </li>
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li>
	      <a href="#" aria-label="Next">
	        <span aria-hidden="true">&raquo;</span>
	      </a>
	    </li>
	  </ul> -->
</div>
@endsection
