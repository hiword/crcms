@extends('layout.manage-layout')
@section('list-header')
<h3>
	新增题目
	<a class="btn btn-sm btn-default" href="{{url('manage/subject/index')}}">列表</a>
</h3>
@endsection
@section('sidebar')
<h2 class="logo">Hacker</h2>
<div class="sidebar">
	<ul class="nav nav-pills nav-stacked">
	     <li id="accordion0" class="active">
			<a href="#collapse-ul-0" data-parent="#accordion0" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">HackerTest</a>
			<ul  id="collapse-ul-0" class="collapse in">
				<li><a href="{{url('manage/subject/index')}}">题目列表</a></li>
			</ul>
		</li>
	</ul>
</div>
@endsection
@section('main')
<form action="{{url('manage/subject/store')}}" class="valid-form" method="post">
{{csrf_field()}}
<div class="row pb20">
	<div class="col-md-9">
		
		<div class="form-group">
			<label class=" Validform_label label-name">名称</label>
			<input class="form-control" type="text" name="title" datatype="*1-120" placeholder="">
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">说明</label>
			<textarea id="container" name="content"></textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group btn-action">
      		<button class="btn btn-default mr10" type="button">重置</button>
      		<button class="btn btn-success " type="submit">提交</button>
      	</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
            <label class=" Validform_label label-name">答案</label>
			<textarea class="form-control" type="text" name="answer" placeholder=""></textarea>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">分值</label>
			<input class="form-control" type="text" name="score" datatype="/^[\d]*$/" value="0" ignore="ignore" >
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class="Validform_label label-name">状态</label>
			<div>
				@foreach($status as $key=>$value)
				<label class="radio-inline">
					<input type="radio" name="status" value="{{$key}}" {{$key==1 ? 'checked=checked' : null}}>
					{{$value}}
				</label>
				@endforeach
			</div>
			<p class="help-block Validform_checktip"></p>
		</div>
		
		<div class="form-group">
			<label class=" Validform_label label-name">排序</label>
			<input class="form-control" type="text" name="sort" datatype="/^[\d]*$/" value="0" ignore="ignore" >
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
		uploaded({
			ok:function(){
				var value = $('[name^="uploads[][src]"]').first().val();
				$this.find('img').attr('src',value);
				$('[name="document[thumbnail]"]').val($('[name^="uploads[][src]"]').first().attr('path'));
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
