@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增分类
	<a class="btn btn-sm btn-default" href="{{url('manage/category/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/category/store')}}" method="post" class="valid-form">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="row">
	<div class="col-md-9">
		<div class="form-group">
			<label class=" Validform_label label-name">上级类别</label>
			<select class="form-control" name="pid" datatype="/^[\d]+$/" ignore="ignore">
				<option value="0">顶级类别</option>
				@foreach($tree as $key=>$values)
				<option value="{{$values['id']}}">
				{{$values['delimiter']}}
				{{$values['name']}}
				</option>
				@endforeach
			</select>
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">类别名称</label>
			<input class="form-control" type="text" name="name" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">类别标识</label>
			<input class="form-control" type="text" name="mark" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="status" value="{{$key}}" {{$key==1 ? 'checked' : null}}>
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