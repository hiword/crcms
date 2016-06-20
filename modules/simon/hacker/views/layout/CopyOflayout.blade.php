@extends('layout.layout')

@section('style')
@parent
<link rel="stylesheet" href="{{static_asset('vendor/hacker/hacker.css')}}" />
<link rel="stylesheet" href="{{static_asset('vendor/hacker/hacker_body.css')}}" />
@endsection

@section('body')
	<div class="container-fluid">
		<div class="box" style="position: absolute;right:10px;top:10px;">
			@if(Auth::user())
				<span class="set-red">{{Auth::user()->name}}</span>&nbsp;您好！
				<a href="{{url('auth/logout')}}" style="font-size:15px;text-decoration:underline;">退出</a>
			@endif
		</div>
		<h1 class="text-center g-title">Hacker Test</h1>
		@yield('son-body')
	</div>
@endsection

@section('script')
@parent
<script>
$(function(){
	$('.hacker-form').on('submit',function(){
		$.ajax({
			type:'POST',
			url:$(this).attr('action'),
			data:$(this).serialize(),
			success:function(response){
				alert(response.app_message);
				if(response.app_code == 1000)
				{
					setTimeout(function(){
						window.location.href = '{{url("hacker/index")}}';
					},800);
				}
			},
			error:function(response){
				alert(response.responseJSON.app_message);
			}
		});
		return false;
	});
});
</script>
@endsection
