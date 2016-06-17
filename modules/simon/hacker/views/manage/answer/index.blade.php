@extends('layout.manage-index')
@section('list-header')
<h3>
	回答列表
	<!-- 
	<a class="btn btn-sm btn-default" href="{{url('manage/subject/create')}}">加题目</a>
	 -->
</h3>
@endsection
@include('hacker::manage.sidebar')
@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>参与人</th>
<th>分值</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td>
			<input type="checkbox" name="id[]" value="{{$model->id}}" hash="{{create_hash($model->id)}}"/>
		</td>
		<td>
			<a href="{{url('manage/answer/show/'.$model->user_id)}}">{{$model->hasOneUser->name}}({{$model->hasOneUser->email}})</a>
		</td>
		<td>{{$model->scores()}}</td>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/answer/destroy')}}">删除</option>
@endsection
