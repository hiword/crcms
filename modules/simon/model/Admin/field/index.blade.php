@extends('manage.coding.layout.layout')
@section('h')
字段列表
@stop
@section('body')
	<div class="btn-operations">
		<a href="{{url('manage/field/create')}}?model_id={{$model_id}}" class="btn btn-sm btn-success">新增</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="batch-edit">编辑</a>
		<a href="###" class="btn btn-sm btn-grey ml10" id="batch-delete">删除</a>
	</div>
	<table class="table table-hover mt10">
		<tr>
			<th><input type="checkbox" id="all-election"/></th>
			<th>字段名</th>
			<th>类型</th>
			<th>长度</th>
			<th>状态</th>
		</tr>
		<?php foreach ($data as $values) {?>
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$values->id}}" /></td>
			<td><a href="<?php echo url('manage/field/'.$values->id.'/edit')?>?model_id={{$values->model_id}}"><?php echo $values->name?></a></td>
			<td><?php echo $values->type?></td>
			<td><?php echo $values->length?></td>
			<td><?php echo $status[$values->status]?></td>
		</tr>
		<?php }?>
	</table>
@stop

@section('script')
@include('manage.coding.field.js-controller')
@stop
