@extends('layout.manage-index')
@section('list-header')
<h3>
	分类列表
	<a class="btn btn-sm btn-default" href="{{url('manage/field/create')}}">新模型</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<div class="form-group">
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>名称</th>
<th>字段类型</th>
<th>所属模型</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($models as $key=>$model)
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$model->id}}" /></td>
			<td>
				<div>{{$model->alias}}&nbsp;({{$model->name}})</div>
				<div>
					<a href="{{url('manage/field/edit/'.$model->id.'/'.create_hash($model->id))}}" class="fs12">编辑</a>
					<a href="###" class="ml5 fs12 destroy-value" value="{{$model->id}}" hash="{{create_hash($model->id)}}" ajax-url="{{url('manage/field/destroy')}}">删除</a>
				</div>
			</td>
			<td>{{$field_types[$model->type]}}&nbsp;({{$model->type}})</td>
			<td>{{implode(',',$model->models)}}</td>
			<td>{{$status[$model['status']] or null}}</td>
		</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/field/destroy')}}">删除</option>
@endsection
