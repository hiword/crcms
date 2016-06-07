@extends('layout.manage-index')
@section('list-header')
<h3>数据统计</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索内容" class="form-control input-sm" />
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>ClientIp</th>
<th>Agent</th>
<th>Time</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td><input type="checkbox" name="id[]" value="{{$model->id}}" /></td>
		<td>{{$model->client_ip}}</td>
		<td>{{$model->hasOneCountDetail->agent or null}}</td>
		<td>{{format_date($model->created_at)}}</td>
	</tr>
	@endforeach
@endsection
