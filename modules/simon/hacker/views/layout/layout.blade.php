@extends('layout.layout')
@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('vendor/hacker/hacker.css')}}" />
<link rel="stylesheet" href="{{static_asset('vendor/hacker/hacker_body.css')}}" />
@endsection

@section('body')
<div class="zx-header">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{url('/')}}">
	      	<img src="http://www.cnzxsoft.com/content/templates/default/images/new-logo.png" height="45" />
	      </a>
	    </div>
	
	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="{{url('auth/logout')}}">Logout</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</div>
<div class="container-fluid mt30">
	<div class="row">
		<div class="col-md-3">
			<ul class="list-group subject-list">
			<?php $i=1?>
			@foreach($models as $model)
			  <li class="list-group-item {{isset($id) && $model->id==$id ? 'active' : null}} clearfix">
			  	<a href="{{url('hacker/show/'.$model->id)}}" class=""><span class="set-red">({{$model->score}}分)</span>&nbsp;{{$model->title}}</a>
			  	@if($model->answer_status_code)
			  	<span class="badge"><i class="glyphicon glyphicon-{{$model->answer_status}}"></i></span>
			  	@endif
			  </li>
			<?php $i+=1?>
		 	@endforeach
			</ul>
		</div>
		<div class="col-md-9">
			@yield('container')
		</div>
	</div>
</div>
@endsection