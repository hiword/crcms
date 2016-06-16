@extends('layout.manage-index')
@section('list-header')
<h3>
	{{$user->name}}({{$user->email}}) 回答详情
	<a class="btn btn-sm btn-default" href="{{url('manage/answer/index')}}">列表</a>
</h3>
@endsection
@include('hacker::manage.sidebar')

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
			{{$model->title}}
		</td>
		<td>{{$model->score}}</td>
		<td>{{$model->status==1 ? '正确' : '错误'}}</td>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/answer/destroy')}}">删除</option>
@endsection
