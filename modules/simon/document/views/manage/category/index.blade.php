@extends('layout.manage-index')
@section('list-header')
<h3>
	分类列表
	<a class="btn btn-sm btn-default" href="{{url('manage/category/create')}}">新增分类</a>
</h3>
@endsection

@section('search-item')
<div class="form-group">
	<input type="text" name="title" placeholder="搜索标题" class="form-control input-sm" />
</div>
<div class="form-group">
	<select name="status" class="form-control input-sm">
		<option value="">类别</option>
		@foreach($tree as $key=>$values)
		<option value="{{$values['id']}}">
		{{$values['delimiter']}}
		{{$values['name']}}
		</option>
		@endforeach
	</select>
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
<th>名称</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($tree as $key=>$model)
		<tr>
			<td><input type="checkbox" name="id[]" value="{{$model['id']}}" /></td>
			<td>
				<div class="pull-left" style="width: auto;">
					{{$model['delimiter']}}
				</div>
				<div class="pull-left" style="width: auto;">
					<p class="mb0">{{$model['name']}}&nbsp;&lt;{{isset($model['mark']) ? $model['mark'] : null}}&gt;</p>
					<p class="mb0">
						<a href="{{url('manage/category/edit/'.$model['id'])}}" class="fs12">编辑</a>
						<a href="###" class="ml5 fs12 destroy-value" ajax-tip="是否确定要删除？" value="{{$model['id']}}" ajax-url="{{url('manage/category/destroy')}}">删除</a>
						<a href="###" class="ml5 fs12">查看</a>
					</p>
				</div>
			</td>
			<td>{{$status[$model['status']] or null}}</td>
		</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/category/destroy')}}">删除</option>
@endsection
