@extends('layout.front-layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('vendor/hacker/hacker.css')}}" />
@endsection

@section('body')
<div class="container-fluid container-auth container-fluid-main">
	<div class="row entrance">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10">
			<h2 class="mb25 mt10 text-center"><img src="http://www.cnzxsoft.com/content/templates/default/images/new-logo.png" height="45" /></h2>
			@include('layout.alert')
			<form method="post" action="{{url('auth/login')}}">
				{{csrf_field()}}
			  <div class="form-group">
			    <label>用户名：</label>
			    <input type="text" name="name" class="form-control" placeholder="Name">
			  </div>
			  <div class="form-group">
			    <label>密码：</label>
			    <input type="password" name="password" class="form-control" placeholder="Password">
			  </div>
			  <div class="form-group">
				  <button type="submit" class="btn-block btn btn-success">Submit</button>
			  </div>
			  <div class="form-group">
			 	 <p class="clearfix">
					<a href="{{url('auth/register')}}" class="pull-left">立即注册</a>
					<a href="###" class="pull-right">找回密码</a>
				</p>
			  </div>
			</form>
		</div>
		<div class="col-md-4 col-xs-1"></div>
	</div>
</div>
@endsection