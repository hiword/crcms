@if((boolean)$_msg = session('app_message'))
	@if(count($errors)>0)
		<div class="alert alert-danger">错误码：{{session('app_code')}}，错误信息：{{$_msg}}</div>
	@else
		<div class="alert alert-success">{{$_msg}}</div>
	@endif
@endif
