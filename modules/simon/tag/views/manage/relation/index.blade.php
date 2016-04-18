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
<th>标签</th>
<th>关联模型/Id</th>
@endsection

@section('table-list')
	@foreach($models as $model)
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$model->tag_id}}|{{$model->outside_id}}|{{$model->outside_type}}" /></td>
			<td>{{$model->hasOneTag->name or null}}</td>
			<td>
				<div>{{$model->outside_type}}&nbsp;({{$model->outside_id}})</div>
				<div>
					<a href="###" class="fs12 destroy-value" ajax-tip="是否确定要删除？" value="{{$model->tag_id}}|{{$model->outside_id}}|{{$model->outside_type}}" ajax-url="{{url('manage/tags-relation/destroy')}}">删除</a>
				</div>
			</td>
		</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/tags-relation/destroy')}}">删除</option>
@endsection
