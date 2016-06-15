@extends('hacker::layout.layout')
@section('body')
<div class="container">
	<div class="row index">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			<h2>JS密码获取</h2>
			<div class="hacker-desc">
				<p>要求点击下面链接，反推出JS解密后的答案</p>
				<p><a href="{{config('link.show_9')}}" target="_blank" class="hacker-a">点击此链接</a></p>
				<p>填写反推出的JS值</p>
			</div>
			<div class="hacker-form-box">
				<form class="hacker-form" action="{{url('hacker/store/'.$model->topic_num)}}" method="post">
					<!-- 
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					 -->
					<input type="hidden" name="_hash" value="{{$model->_hash}}" />
					<div class="form-group">
						<div class="col-md-10 hacker-text-box">
							<input type="text" placeholder="填写反推出的JS值" class="hacker-text form-control" name="content" />
						</div>
						<div class="col-md-2">
							<button class="btn btn-success" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-3">&nbsp;</div>
	</div>
</div>
@endsection

@section('script')
@parent
@endsection

