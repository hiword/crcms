@extends('manage.coding.layout.layout')
@section('h')
模型列表
@stop
@section('body')
	<div class="btn-operations">
		<a href="<?php echo asset('manage/model/create')?>" class="btn btn-sm btn-success">新增</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="batch-edit">编辑</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="field">字段</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="generation">生成</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="batch-delete">删除</a>
		
	</div>
	<table class="table table-hover mt10">
		<tr>
			<th><input type="checkbox" id="all-election"/></th>
			<th>模型</th>
			<th>名称</th>
			<th>引擎</th>
			<th>类型</th>
			<th>状态</th>
		</tr>
		<?php foreach ($data as $values) {?>
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$values->id}}" /></td>
			<td><a href="<?php echo url('manage/model/'.$values->id.'/edit')?>"><?php echo $values->name?></a></td>
			<td><?php echo $values->table_name?></td>
			<td><?php echo $values->engine?></td>
			<td><?php echo $type[$values->type]?></td>
			<td><?php echo $status[$values->status]?></td>
		</tr>
		<?php }?>
	</table>
@stop

@section('script')
@include('manage.coding.model.js-controller')
@stop
