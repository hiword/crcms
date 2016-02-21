@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增文档
	<a class="btn btn-sm btn-default" href="{{url('manage/document/index')}}">列表</a>
</h3>
@endsection
@section('main')
<form action="{{url('manage/document/store')}}" class="valid-form" method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<div class="row pb20">
	<div class="col-md-9">
		
		<div class="form-group">
			<label class=" Validform_label label-name">标题</label>
			<input class="form-control" type="text" name="document[title]" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">内容</label>
			<textarea id="container" name="document_data[content]"></textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
                <label class=" Validform_label label-name">链接</label>
			<input class="form-control" type="text" name="document[torrent]" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group btn-action">
      		<button class="btn btn-default mr10" type="button">重置</button>
      		<button class="btn btn-success " type="submit">提交</button>
      	</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class=" Validform_label label-name">类别</label>
			<select class="form-control" name="category_id[]" multiple="multiple" style="height: 150px;">
				@foreach($tree as $key=>$values)
					<option value="{{$values['id']}}">
					{{$values['delimiter']}}
					{{$values['name']}}
					</option>
					@endforeach
			</select>
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">标签</label>
			@include('tag::select_tags')
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class="Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="document[status]" value="{{$key}}" {{$key==1 ? 'checked=checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">排序</label>
			<input class="form-control" type="text" name="document[sort]" datatype="/^[\d]*$/" value="0" ignore="ignore" >
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class="Validform_label label-name">SEO标题</label>
			<input class="form-control" type="text" name="document_data[seo_title]" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">SEO关键字</label>
			<input class="form-control" type="text" name="document_data[seo_keywords]" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		<div class="form-group">
			<label class=" Validform_label label-name">SEO描述</label>
			<textarea class="form-control" name="document_data[seo_description]"></textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
	</div>
</div>
</form>

@endsection
@section('script')
@parent
<script src="{{static_asset('static/ueditor/ueditor.config.js')}}"></script>
<script src="{{static_asset('static/ueditor/ueditor.all.min.js')}}"></script>
<script type="text/javascript">
	var ue = UE.getEditor('container');
</script>
@include('tag::select_tags_js')
@endsection
