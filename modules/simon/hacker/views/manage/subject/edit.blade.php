@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增题目
	<a class="btn btn-sm btn-default" href="{{url('manage/subject/index')}}">列表</a>
</h3>
@endsection
@include('hacker::manage.sidebar')
@section('main')
<form action="{{url('manage/subject/update/'.$model->id)}}" class="valid-form" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="put" />
<div class="row pb20">
	<div class="col-md-9">
		
		<div class="form-group">
			<label class=" Validform_label label-name">名称</label>
			<input class="form-control" type="text" value="{{$model->title}}" name="title" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">说明</label>
			<textarea id="container" name="content">{{$model->content}}</textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group btn-action">
      		<button class="btn btn-default mr10" type="button">重置</button>
      		<button class="btn btn-success " type="submit">提交</button>
      	</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label class=" Validform_label label-name">测试文件</label>
			<input type="hidden" name="file" value="{{$model->file}}" />
			<a href="###" class="upload-dialog">{{$model->file ? basename($model->file) : '上传PHP'}}</a>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
            <label class=" Validform_label label-name">答案</label>
			<textarea class="form-control" type="text" name="answer" placeholder="">{{$model->answer}}</textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">分值</label>
			<input class="form-control" type="text" value="{{$model->score}}" name="score" datatype="/^[\d]*$/" value="0" ignore="ignore" >
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class="Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="status" value="{{$key}}" {{$key==$model->status ? 'checked=checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">排序</label>
			<input class="form-control" type="text" name="sort" datatype="/^[\d]*$/" value=" {{$model->sort}}" ignore="ignore" >
			<p class="help-block Validform_checktip"></p>
		</div>
		
	</div>
</div>
</form>

@endsection
@section('script')
@parent
<script src="{{static_asset('vendor/ueditor/ueditor.config.js')}}"></script>
<script src="{{static_asset('vendor/ueditor/ueditor.all.min.js')}}"></script>
<script>
	var ue = UE.getEditor('container');
	//single img upload
	$('.upload-dialog').on('click',function(){
		var $this = $(this);
		uploaded('exec_upload',{
			ok:function(){
				var value = $('[name^="uploads[][src]"]').first().attr('path');
				$('[name="file"]').val(value);
				$this.text(value.split("/")[value.split("/").length-1]);
				return true;
			}
		});
		return false;
	});

	$('.upload-images').on('click',function(){

		var $this = $(this);
		
		uploaded('mixed_upload',{
			ok:function(){
				$('[name^="uploads[][src]"]').each(function(){
					var str = '<div class="col-md-3">';
						if($.inArray($(this).attr('extension'),['jpg','jpeg','gif','png']) > -1)
						{
							str += '<a href="###" class="thumbnail" style="height:150px;overflow:hidden;"><img src="'+$(this).val()+'" alt="" /></a>' ;
						}
						else
						{
							str += '<a href="###" class="thumbnail" style="height:150px;overflow:hidden;">'+$(this).attr('extension')+'</a>' ;
						}
							str += 		'</div>';
							str += '<input type="hidden" name="images[][path]" value="'+$(this).attr('path')+'" />';
					$('.images-queue').append(str);
				});
				return true;
			}
		});
		return false;
	});
	
// 	$('.upload-files').on('click',function(){
// 		var $this = $(this);
// 		uploaded('seed_upload',{
// 			ok:function(){
// 				$('[name^="uploads[][src]"]').each(function(){
// 					var str = '<div class="col-md-3">';
// 						str += '<a href="###" class="thumbnail" style="height:150px;overflow:hidden;"><img src="'+$(this).val()+'" alt="" /></a>' ;
// 							str += 		'</div>';
// 							str += '<input type="hidden" name="files[][path]" value="'+$(this).attr('path')+'" />';
// 					$('.files-queue').append(str);
// 				});
// 				return true;
// 			}
// 		});
// 		return false;
// 	});
</script>
@include('tag::select_tags_js')
@endsection
