@extends('layout.manage-index')
@section('list-header')
<h3>
	用户列表
	<a class="btn btn-sm btn-default" href="{{url('manage/admin/create')}}">加用户</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<div class="form-group">
	<select name="status" class="form-control input-sm">
		<option value="">状态</option>
		@foreach($status as $key=>$value)
			<option value="{{$key}}">{{$value}}</option>
		@endforeach
	</select>
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>用户名</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td><input type="checkbox" name="id[]" value="{{$model->id}}" /></td>
		<td>
			<div>{{$model->name}}</div>
			<div>
				<a href="{{url('manage/admin/edit/'.$model->id)}}" class="fs12">编辑</a>
				<a href="###" class="ml5 fs12 destroy-value" ajax-tip="是否确定要删除？" value="{{$model->id}}" ajax-url="{{url('manage/admin/destroy')}}">删除</a>
				<a href="###" class="ml5 fs12">查看</a>
			</div>
		</td>
		<td>{{$status[$model->status] or null}}</td>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/admin/destroy')}}">删除</option>
@endsection
