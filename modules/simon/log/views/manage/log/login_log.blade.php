@extends('layout.manage-index')
@section('list-header')
<h3>
	行为日志
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索内容" class="form-control input-sm" />
</div>
<button type="submit" class="btn btn-sm btn-default">Search</button>
@endsection

@section('table-header')
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Url</th>
<th>ClientIp</th>
<th>Remark</th>
<th>Time</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td><input type="checkbox" name="id[]" value="{{$model->id}}" /></td>
		<td>{{$model->name}}</td>
		<td>{{$model->email}}</td>
		<td>{{$model->status==1 ? 'success' : 'error'}}</td>
		<td>{{$model->url}}</td>
		<td>{{long_ip($model->client_ip)}}</td>
		<td>{{$model->remark}}</td>
		<td>{{format_date($model->created_at)}}</td>
	</tr>
	@endforeach
@endsection
