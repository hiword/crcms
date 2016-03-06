@extends('layout.manage-layout')
@section('style')
<style>
.entrance {width:30%;margin:150px auto;}
</style>
@endsection
@section('body')
	<div class="entrance">
		<h3 class="text-center mb20">系统登录</h3>
		@if(session('msg'))
		<div class="alert {{count($errors) ? 'alert-danger' : 'alert-success'}}">{{session('msg')}}</div>
		@endif
		<form action="{{url('manage/auth/login')}}" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			<!-- 
			<input type="hidden" name="redirect_url" value="{{url('user')}}" />
			 -->
		  <div class="form-group">
		    	<input type="text" name="name" class="form-control" placeholder="Username">
		  </div>
		  <div class="form-group">
			    <input type="password" name="password" class="form-control" placeholder="Password">
		  </div>
		  <button type="submit" class="btn-block btn btn-success">Submit</button>
		</form>
	</div>
@stop

