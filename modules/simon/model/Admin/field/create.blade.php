@extends('manage.coding.layout.layout')

@section('h')
新增模型
@stop

@section('body')
<div class="form">
{!! Form::open(['url' => 'manage/field','class'=>'valid-form','method'=>'post']) !!}
{!!Form::hidden('model_id',$model_id)!!}
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
				<option value="text">单行文本</option>
				<option value="radio">单选按钮</option>
				<option value="select">下拉框</option>
				<option value="checkbox">复选框</option>
				<option value="textarea">文本框</option>
				<option value="editor">编辑器</option>
				<option value="file">单文件</option>
				<option value="files">多文件</option>
		      <option value="hidden">隐藏域</option>
			</select>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">字段标题</label>
			<input class="form-control" type="text" name="setting[label]" placeholder=""><!-- datatype="*"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">字段备注</label>
			<input class="form-control" type="text" name="setting[tip]"  placeholder=""><!-- datatype="*"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单属性</label>
			<textarea class="form-control" rows="4" cols="50" name="setting[attr]" placeholder=""></textarea><!-- datatype="*"  -->
			<p class="help-block Validform_checktip">一行一个</p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单排序</label>
			<input class="form-control" type="number" name="sort" value="0"  placeholder=""><!-- datatype="n"  -->
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">表单选项</label>
			<textarea class="form-control" rows="4" cols="50" name="setting[option]" ignore="ignore" placeholder=""></textarea><!-- datatype="*"  -->
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
			<input class="form-control" type="text" name="setting[validator_php]" datatype="*" ignore="ignore" placeholder="">
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