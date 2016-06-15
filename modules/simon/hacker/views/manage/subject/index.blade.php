@extends('layout.manage-index')
@section('list-header')
<h3>
	题目列表
	<a class="btn btn-sm btn-default" href="{{url('manage/subject/create')}}">加题目</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>题目</th>
<th>分值</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td>
			<input type="checkbox" name="id[]" value="{{$model->id}}" hash="{{create_hash($model->id)}}"/>
		</td>
		<td>
			<div>{{$model->title}}</div>
			<div>
				<a href="{{url('manage/subject/edit/'.$model->id.'/'.create_hash($model->id))}}" class="fs12">编辑</a>
				<a href="###" class="ml5 fs12 destroy-value" value="{{$model->id}}" hash="{{create_hash($model->id)}}" ajax-url="{{url('manage/subject/destroy')}}">删除</a>
				<a href="###" class="ml5 fs12">查看</a>
			</div>
		</td>
		<td>{{$model->score}}</td>
		<td>{{$status[$model->status] or null}}</td>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/subject/destroy')}}">删除</option>
@endsection
