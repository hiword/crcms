@extends('layout.manage-index')
@section('list-header')
<h3>
	标签列表
	<a class="btn btn-sm btn-default" href="{{url('manage/tags/create')}}">新增标签</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>名称</th>
<th>说明</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($models as $model)
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$model->id}}" /></td>
			<td>
				<div>{{$model->name}}</div>
				<div>
					<a href="{{url('manage/category/edit/1')}}" class="fs12">编辑</a>
					<a href="###" class="ml5 fs12 destroy-value" ajax-tip="是否确定要删除？" value="{{$model['id']}}" ajax-url="{{url('manage/category/destroy')}}">删除</a>
					<a href="###" class="ml5 fs12">查看</a>
				</div>
			</td>
			<td>{{$model->hasOneTagContent->content}}</td>
			<td>{{$status[$model->status]}}</td>
		</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/category/destroy')}}">删除</option>
@endsection
