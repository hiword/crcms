@extends('hacker::layout.layout')

@section('son-body')
<div class="container">
	<div class="row index">
		<div class="col-md-3">&nbsp;</div>
		<div class="col-md-6">
			<h2>{{$model->title}}({{$model->score}}分)</h2>
			<div class="hacker-desc">
				{!!$model->content!!}
				@if($model->file)
				<?php /*
				<p>链接文件地址：<a href="{{url('hacker/start/'.$model->id)}}" target="_blank">点击此处</a></p>
				*/?>
				<!--  -->
				<p>链接文件地址：<a href="{{script_url($model->file)}}" target="_blank" style="color:red;">点击此处</a></p>
				@endif
			</div>
			<div class="hacker-form-box">
				@if($user_subject)
				<form class="hacker-form" action="{{url('hacker/update/'.$user_subject->id)}}" method="post">
				<input type="hidden" name="id" value="{{$user_subject->id}}" />
				<input type="hidden" name="_method" value="put" />
				@else
				<form class="hacker-form" action="{{url('hacker/store')}}" method="post">
				@endif
					<input type="hidden" name="_hash" value="{{$model->_hash}}" />
					<input type="hidden" name="subject_id" value="{{$model->id}}" />
					{{csrf_field()}}
					<div class="form-group">
						<div class="col-md-10 hacker-text-box">
							<input type="text" placeholder="请输入结果" value="{{$user_subject->answer or null}}" class="hacker-text form-control" name="answer" />
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
