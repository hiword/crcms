@extends('manage.coding.layout.layout')

@section('h')
编辑模型
@stop

@section('body')
<div class="form">
{!! Form::open(['url' => 'manage/field/'.$data->id,'class'=>'valid-form','method'=>'put']) !!}
{!!Form::hidden('model_id',$model_id)!!}
{!!Form::hidden('id',$data->id)!!}
{!!Form::hidden('_hash',$data->_hash)!!}
<ul class="nav nav-tabs">
  <li class="active" role="presentation">
		<a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" href="#field">字段</a>
	</li>
	<li role="presentation">
		<a aria-controls="profile" data-toggle="tab" role="tab" href="#form">表单</a>
	</li>
	<li role="presentation">
		<a aria-controls="profile" data-toggle="tab" role="tab" href="#validate">验证</a>
	</li>
</ul>
<div class="tab-content">
	<div id="field" class="tab-pane fade in active mt10" aria-labelledby="home-tab" role="tabpanel">
		@include('manage.coding.layout.form-container')
	</div>
	<div id="form" class="tab-pane fade mt10" aria-labelledby="profile-tab" role="tabpanel">
		<div class="form-group">
			<label class=" Validform_label label-name">表单类型</label>
			<select class="form-control Validform_label" name="setting[type]" placeholder=""><!-- datatype="*1-30"  -->
				<option value="">选择表单类型</option>
				<option value="text" {{$data->setting->type == 'text' ? 'selected="selected"' : null}}>单行文本</option>
				<option value="radio" {{$data->setting->type == 'radio' ? 'selected="selected"' : null}}>单选按钮</option>
				<option value="select" {{$data->setting->type == 'select' ? 'selected="selected"' : null}}>下拉框</option>
				<option value="checkbox" {{$data->setting->type == 'checkbox' ? 'selected="selected"' : null}}>复选框</option>
				<option value="textarea" {{$data->setting->type == 'textarea' ? 'selected="selected"' : null}}>文本框</option>
				<option value="editor" {{$data->setting->type == 'editor' ? 'selected="selected"' : null}}>编辑器</option>
				<option value="file" {{$data->setting->type == 'file' ? 'selected="selected"' : null}}>单文件</option>
				<option value="files" {{$data->setting->type == 'files' ? 'selected="selected"' : null}}>多文件</option>
		      <option value="hidden" {{$data->setting->type == 'hidden' ? 'selected="selected"' : null}}>隐藏域</option>
			</select>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">字段标题</label>
			<input class="form-control" type="text" name="setting[label]" value="{{$data->setting->label}}" placeholder=""><!-- datatype="*"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">字段备注</label>
			<input class="form-control" type="text" name="setting[tip]"  value="{{$data->setting->tip}}" placeholder=""><!-- datatype="*"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单属性</label>
			<textarea class="form-control" rows="4" cols="50" name="setting[attr]" placeholder="">{{$data->setting->attr}}</textarea><!-- datatype="*"  -->
			<p class="help-block Validform_checktip">一行一个</p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单排序</label>
			<input class="form-control" type="number" name="sort" value="{{$data->sort}}" placeholder=""><!-- datatype="n"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单选项</label>
			<textarea class="form-control" rows="4" cols="50" name="setting[option]" ignore="ignore" placeholder="">{{$data->setting->option}}</textarea><!-- datatype="*"  -->
			<p class="help-block Validform_checktip">一行一个</p>
		</div>
		<div class="form-group">
			<label class="Validform_label label-name">是否惟一</label>
			<div>
				<label class="radio-inline">
					<input type="radio" name="setting[is_unique]" value="1">
					是
				</label>
				<label class="radio-inline">
					<input type="radio" name="setting[is_unique]" value="2" checked="checked">
					否
				</label>
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
	</div>
	<div id="validate" class="tab-pane fade mt10" aria-labelledby="profile-tab" role="tabpanel">
		<div class="form-group">
			<label class=" Validform_label label-name">验证规则</label>
			<input class="form-control" type="text" name="setting[validator_php]" value="{{$data->setting->validator_php}}" datatype="*" ignore="ignore" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
	</div>
</div>
<div class="text-right">
      		<button class="btn btn-success mr10" type="submit">提交</button>
      		<button class="btn btn-grey" type="button">重置</button>
      	</div>
{!! Form::close() !!}
</div>
@stop

@section('script')
@include('manage.coding.field.js-controller')
<script>
</script>
@stop