@extends('layout.front-layout')

@section('style')
@parent
<link href="{{static_asset('vendor/92db/css/92db.css')}}" rel="stylesheet">
@endsection

@section('body')
<div class="db-header">
	<?php /*
	<div class="broadcast">
		<div class="container ">
			<span class="glyphicon glyphicon-volume-up"></span>
			<a href="###">欢乐多多，热烈庆祝本站顺利开通！</a>
		</div>
	</div>*/?>
	<nav class="navbar navbar-default db-navbar">
	  <div class="container"><!-- -fluid -->
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('/')}}" title="就爱逗比(92doubi)"><img src="{{static_asset('vendor/92db/images/logo.png')}}" alt="就爱逗比网(92doubi)" /></a>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        
	        <li class="{{Request::is('/') ? 'active' : null}}"><a href="{{url('/')}}">最新 <span class="sr-only">(current)</span></a></li>
	        @category
	        <li class="{{Request::is('d/'.$category->id) ? 'active' : null}}"><a href="{{route('doubi',['cid'=>$category->id])}}" title="{{$category->name}}">{{$category->name}} <span class="sr-only">(current)</span></a></li>
	        @endcategory
	      </ul>
	      <!-- 
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form> -->
	      <ul class="nav navbar-nav navbar-right db-user-box">
	        <li><a href="#">登录</a></li>
	        <li><a href="#">注册</a></li>
	        <!-- 
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li> -->
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
<div class="container">
	<div class="row db-main">
		<div class="col-md-9 main-left">
			@yield('main-box')
		</div>
		<div class="col-md-3 main-right">
			<div class="panel">
				<div class="panel-heading bs-callout bs-callout-danger"><h3 class="">热门标签</h3></div>
				<div class="panel-body">
					<?php /*{{url('tags/search')}}?name={{$tag->name}}*/?>
					@tag('hot')
					<a href="{{url('tags/search')}}?name={{$tag->name}}" class="sidebar-tag">{{$tag->name}} ({{$tag->count_num}})</a>
					@endtag
				</div>
			</div>
			
			<div class="panel ">
				<div class="panel-heading bs-callout bs-callout-danger">
					<h3>关注我们</h3>
				</div>
				<div class="panel-body">
					<img alt="" class="img-responsive" src="{{static_asset('vendor/92db/images/wx.jpg')}}">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- footer -->
<footer class="">
	<div class="container">
		<div class="copyright">
			<p>92doubi(就要逗比) - 让你开心每一天，是我们最大的心愿。</p>
			<p>
				版权所有，保留一切权利！ Copyright © 2016 CRCMS强力驱动 皖ICP备15025087号-3
			</p>
		</div>
	</div>
</footer>

@endsection


@section('script')
@parent
<!-- 
<script src="{{static_asset('vendor/lazyload/lazyload.min.js')}}"></script>
 -->
<script>
$(function(){

	$('.gb-count').on('click',function(){
		var $this = $(this);
		var url = '{{url("count/count")}}'+'/'+$(this).attr('count-id')+'/'+'{{rawurlencode("Simon\Document\Models\Doubi")}}'+'/'+$(this).attr('type');
		$.post(url,{_token:"{{csrf_token()}}"},function(data){
			var num = parseInt($this.children('span').text());
			$this.children('span').text(num+1);
		});
		return false;
	});
	
	//$(".lazy").lazyload();
	$('.loading-img').on('click',function(){
		var $this = $(this);
		if($this.attr('status') === 'small')
		{
			//loading show
			$this.siblings('.loadingBox').show();

			var img=new Image();
			img.src = $this.attr('original-src');

			$(img).on('load',function(){
				$this.siblings('.loadingBox').hide();
				$this.attr('src',$this.attr('original-src'));
			});
			/*
			$this.attr('src',$this.attr('original-src'));

			//加载完成
			$this.on('load',function(){
				$this.siblings('.loadingBox').hide();
			});*/
			$this.attr('status','big');
		}
		else
		{
			$this.attr('src',$this.attr('small-src'));
			$this.attr('status','small');
		}
	});
});
    </script>
@endsection
