@extends('layout.manage-index')
@section('list-header')
<h3>
	文档列表
	<a class="btn btn-sm btn-default" href="{{url('manage/doubi/create')}}">写文章</a>
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
<th>标题</th>
<th>发布人</th>
<th>状态</th>
@endsection

@section('table-list')
	@foreach($models as $model)
	<tr>
		<td>
			<input type="checkbox" name="id[]" value="{{$model->id}}" hash="{{create_hash($model->id)}}"/>
		</td>
		<td>
			<div>
				@if($model->seo_title)
				{{$model->seo_title}}
				@elseif($model->hasOneDoubiData->content)
				{{mb_substr($model->hasOneDoubiData->content,0,150,'UTF-8')}}
				@else
				图
				@endif
			</div>
			<div>
				<a href="{{url('manage/doubi/edit/'.$model->id.'/'.create_hash($model->id))}}" class="fs12">编辑</a>
				<a href="###" class="ml5 fs12 destroy-value" value="{{$model->id}}" hash="{{create_hash($model->id)}}" ajax-url="{{url('manage/doubi/destroy')}}">删除</a>
				<a href="###" class="ml5 fs12">查看</a>
			</div>
		</td>
		<td>Admin</td>
		<td>{{$status[$model->status] or null}}</td>
	</tr>
	@endforeach
@endsection

@section('table-btn')
<option value="destroy" ajax-url="{{url('manage/document/destroy')}}">删除</option>
@endsection
