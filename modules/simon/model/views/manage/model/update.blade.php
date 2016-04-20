@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增分类
	<a class="btn btn-sm btn-default" href="{{url('manage/model/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/model/update/'.$model->id)}}" method="post" class="valid-form">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<input type="hidden" name="_method" value="put" />
<input type="hidden" name="id" value="{{$model->id}}" />
<div class="row">
	<div class="col-md-9">
	    <div class="form-group">
			<label class=" Validform_label label-name">模型名称</label>
			<input class="form-control" type="text" name="name" value="{{$model->name}}" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">模型标识</label>
			<input class="form-control" type="text" name="mark" value="{{$model->mark}}" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">数据表名</label>
			<input class="form-control" type="text" name="table_name" value="{{$model->table_name}}" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">数据引擎</label>
			<div>
				@foreach($engine as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="engine" value="{{$key}}" {{$key==$model->engine ? 'checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">模型类型</label>
			<div>
				@foreach($type as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="type" value="{{$key}}" {{$key==$model->type ? 'checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">模型继成</label>
			<div>
				@foreach($extends as $key=>$value)
				<label class="checkbox-inline">
					<input type="checkbox" name="extends[]" value="{{$key}}" {{in_array($key,$already_extend) ? 'checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">备注说明</label>
			<textarea name="remark" class="form-control">{{$model->remark}}</textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="status" value="{{$key}}" {{$key==$model->status ? 'checked' : null}}>
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