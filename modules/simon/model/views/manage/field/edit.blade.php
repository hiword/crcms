@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增字段
	<a class="btn btn-sm btn-default" href="{{url('manage/field/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/field/update/'.$model->id)}}" method="post" class="valid-form">
<input type="hidden" name="_method" value="put" />
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<input type="hidden" name="id" value="{{$model->id}}" />
<div class="row">
	<div class="col-md-9">
		<div class="form-group">
			<label class=" Validform_label label-name">字段类型</label>
			<select name="type" class="form-control" id="type">
				<option value="">选择字段类型</option>
				@foreach($field_types as $key=>$value)
				<option value="{{$key}}" {{$key==$model->type ? 'selected' : null}}>{{$value}}</option>
				@endforeach
			</select>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">所属模型</label>
			<div>
				@foreach($_models as $key=>$value)
				<label class="checkbox-inline">
					<input type="checkbox" name="model_id[]" value="{{$value->id}}" {{isset($models[$value->id]) ? 'checked' : null}}>
					{{$value->name}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip">注意：同一字段不可同时被包含于属于主模型和附加模型中</p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">字段名称</label>
			<input class="form-control" type="text" name="name" value="{{$model->name}}" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">字段说明</label>
			<input class="form-control" type="text" name="alias" value="{{$model->alias}}" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
		<div id="setting"></div>
	    <div class="form-group">
			<label class=" Validform_label label-name">验证规则</label>
			<textarea class="form-control" name="validate_rule">{{implode("\n",$model->validate_rule)}}</textarea>
			<p class="help-block Validform_checktip">使用Laravel验证规则，一行一个，{Id}：表示当前id</p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">表单属性</label>
			<textarea class="form-control" name="form_attr">{{implode("\n",$model->attribute)}}</textarea>
			<p class="help-block Validform_checktip">一行一个，多个值使用","隔开。如：class:a,b,c</p>
		</div>
	    <div class="form-group">
			<label class=" Validform_label label-name">字段提示</label>
			<input class="form-control" type="text" name="tip" value="{{$model->tip}}" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">排序</label>
			<input class="form-control" type="number"  value="{{$model->sort}}" name="sort" datatype="/^[\w]+$/" >
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">uri路径</label>
			<textarea class="form-control" name="uri">{{$model->uri ? implode("\n",$model->uri) : null}}</textarea>
			<p class="help-block Validform_checktip">一行一个</p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">主键</label>
			<div>
				@foreach($primaryKey as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="is_primary" value="{{$key}}" {{$key==$model->is_primary ? 'checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">选项</label>
			<div>
				@foreach($option as $key=>$value)
				<label class="checkbox-inline">
					<input type="checkbox" name="option[]" value="{{$key}}" {{$model->option ? in_array($key,$model->option) ? 'checked' : null : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
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
@section('script')
@parent
<script>
	$(function(){

		$.post('{{url("manage/field/field-setting")}}',{id:'{{$model->id}}',type:'<?php echo $model->type;?>'},function(response){
			$('#setting').html(response.data.template);
		});
		
		$('#type').on('change',function(){
			if(!$(this).val())
			{
				return false;
			}
			$.post('{{url("manage/field/field-setting")}}',{type:$(this).val()},function(response){
				$('#setting').html(response.data.template);
			});
		});
	});
</script>
@endsection