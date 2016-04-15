@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增用户
	<a class="btn btn-sm btn-default" href="{{url('manage/admin/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/admin/store')}}" class="valid-form" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="row pb20">
	<div class="col-md-9">
		
		<div class="form-group">
			<label class=" Validform_label label-name">用户名</label>
			<input class="form-control" type="text" name="name" datatype="*3-12" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">密码</label>
			<input class="form-control" type="text" name="password" datatype="*6-20" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class="Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="status" value="{{$key}}" {{$key==1 ? 'checked=checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group btn-action">
      		<button class="btn btn-default mr10" type="button">重置</button>
      		<button class="btn btn-success " type="submit">提交</button>
      	</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
</form>

@endsection
