@extends('layout.front-layout')

@section('body')


<div class="container-fluid container-auth container-fluid-main">
	<div class="row">
		<div class="col-md-4 col-xs-1"></div>
		<div class="col-md-4 col-xs-10">
			<h2 class="mb25 mt10 text-center">用户注册</h2>
			@include('layout.alert')
			<form method="post" action="{{url('auth/register')}}">
				{{csrf_field()}}
			  <div class="form-group">
			    <label>用户名：</label>
			    <input type="text" name="name" class="form-control" placeholder="Name">
			  </div>
			  <div class="form-group">
			    <label>Email：</label>
			    <input type="text" name="email" class="form-control" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label>密码：</label>
			    <input type="password" name="password" class="form-control" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label>密码确认：</label>
			    <input type="password" name="check_password" class="form-control" placeholder="Password">
			  </div>
			  <div class="form-group">
			  	<p><a href="{{url('auth/login')}}">点击登录</a></p>
				  <button type="submit" class="btn-block btn btn-default">Submit</button>
			  </div>
			</form>
		</div>
		<div class="col-md-4 col-xs-1"></div>
	</div>
</div>
@endsection