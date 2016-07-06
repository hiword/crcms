@extends('layout.manage-index')
@section('list-header')
<h3>
	文档列表
	<a class="btn btn-sm btn-default" href="{{url('manage/document/create')}}">写文章</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<div class="form-group">
	<select name="status" class="form-control input-sm">
		<option value="">类别</option>
	</select>
</div>
<div class="form-group">
	<select name="status" class="form-control input-sm">
		<option value="">状态</option>
	</select>
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
@foreach($fields as $field)
<th>{{$field}}</th>
@endforeach
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td>1</td>
		@foreach($fields as $key=>$alias)
		<td>
			<?php /*
			<input type="checkbox" name="{{$key}}" value="{{$model->$key}}" hash="{{create_hash($model->id)}}"/>
			*/?>
			@if(is_array($model->$key))
			{{implode(',',$model->$key)}}
			@else
			{{$model->$key}}
			@endif
			
		</td>
		@endforeach
		<?php /*
		<td>
			<input type="checkbox" name="id[]" value="{{$model->id}}" hash="{{create_hash($model->id)}}"/>
		</td>
		<td>
			<div>{{$model->title}}</div>
			<div>
				<a href="{{url('manage/document/edit/'.$model->id.'/'.create_hash($model->id))}}" class="fs12">编辑</a>
				<a href="###" class="ml5 fs12 destroy-value" value="{{$model->id}}" hash="{{create_hash($model->id)}}" ajax-url="{{url('manage/document/destroy')}}">删除</a>
				<a href="###" class="ml5 fs12">查看</a>
			</div>
		</td>
		<td>Admin</td>
		<td>{{$status[$model->status] or null}}</td>*/?>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/document/destroy')}}">删除</option>
@endsection
