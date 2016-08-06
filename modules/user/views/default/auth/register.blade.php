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
			    <input type="text" name="mixed" class="form-control" placeholder="Name/Email/Mobile">
			  </div>
			  <div class="form-group">
			    <label>密码：</label>
			    <input type="password" name="password" class="form-control" placeholder="Password">
			  </div>
			  <div class="form-group">
			    <label>密码确认：</label>
			    <input type="password" name="check_password" class="form-control" placeholder="Password">
			  </div>
			  <div class="form-group row">
			  	<div class="col-md-4">
			  		 <span id="verify-code">{!! captcha_img() !!}</span>
			  	</div>
			 	<div class="col-md-8">
			 		<input type="text" class="form-control" name="code" />
			 	</div>
			  <?php //{!! Geetest::render() !!}?>
			  </div>
			  <!-- 
			  <div class="form-group">
			  <button class="btn btn-default" type="button" id="sendVerifySmsButton">Button</button>
			  </div>
			   -->
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

@section('script')
@parent
<script src="{{static_asset('vendor/phpsms/laravel-sms.js')}}"></script>
<script>
$(function(){
	$('#verify-code img').on('click',function(){
		var $this = $(this);
		$.get('{{url("/auth/verify-code-src")}}',function(data){
			$this.attr('src',data); 
		},'text');
	});
})
</script>
<script>
$('#sendVerifySmsButton').sms({
    //laravel csrf token
    token           : "{{csrf_token()}}",
    //定义如何获取mobile的值
    mobile_selector : 'input[name=mobile]',
    //手机号的检测规则
    mobile_rule     : 'mobile_required',
    //请求间隔时间
    interval        : 60
});
</script>
@endsection