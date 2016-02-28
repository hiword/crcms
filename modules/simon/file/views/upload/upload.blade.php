<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>文件上传</title>
	<link rel="stylesheet" href="{{static_asset('vendor/bootstrap/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{static_asset('static/uploads/css/upload.css')}}" />
	<style type="text/css">
           div.upload {
	           padding:50px;
                border:3px dashed #CCCCCC;
           }
           .info {margin-top:20px;}
    </style>
</head>
<body>
    <div class="container-fluid text-center" id="local-container">
        <div class="upload">
            <button type="button" class="btn btn-primary btn-lg" id="select-file">选择文件</button>
    		<button type="button" class="btn btn-success btn-lg ml10" id="upload-file">点击上传</button>
            <p class="info">最大允许上传：2M</p>
        </div>
		<div id="console"></div>
    	<div id="filelist" class="row filelist mt10"></div>
    </div>

	<script src="{{static_asset('vendor/jquery/jquery-2.1.3.min.js')}}"></script>
	<script src="{{static_asset('vendor/plupload/2.1.8/plupload.full.min.js')}}"></script>
	<script>
	
	//获取session_id
	var SESSION_ID = '{{session()->getId()}}';
	var CSRF_TOKEN = '{{csrf_token()}}';
	
	var MULTIPART_PARAMS = {
		SESSION_ID:SESSION_ID,
		_token:CSRF_TOKEN,
		'_json':1,
			//rand:math
	};
		
	var uploader = new plupload.Uploader({
		runtimes : 'html5,flash,silverlight,html4',//html5,flash,silverlight,html4
		browse_button : 'select-file', // you can pass in id...
		container: document.getElementById('local-container'), // ... or DOM Element itself
		url:'{{url("upload/upload")}}',
		flash_swf_url : '{{"vendor/plupload/2.1.8/Moxie.swf"}}',
		silverlight_xap_url : '{{"vendor/plupload/2.1.8/Moxie.xap"}}',
	  	unique_names:true,
		chunk_size: '{{$config["allowfilesize"]}}',
		multipart_params:MULTIPART_PARAMS,
		filters : {
			//根据不同类型设置
			max_file_size : '100mb',
	    //根据不同类型设置
			mime_types: [
				{title : "allow files", extensions : "{{implode(',',$config['allowexttype'])}}"},
			],
			//允许上传的数目，根据不同类型设置
		},
		init: {
			PostInit: function() {
				$('#filelist').html('');
				$('#upload-file').on('click',function(){
					uploader.start();
					return false;
				});
			},
	
			FilesAdded: function(up, files) {
				var html = '';
				plupload.each(files, function(file) {
					html = '<div class="col-xs-3 s-list" id="' + file.id + '">';
					var extension = file.name.split('.');
					html += '<p class="thumb">'+extension[extension.length-1]+'</p>';
					html += '<a class="glyphicon glyphicon-minus-sign list-del remove-queue" href="###"></a>';
					html += '<div class="info">';
					html += '<p class="mt5">' + file.name + ' </p><p>' + plupload.formatSize(file.size) + '&nbsp;<em class="progress ml5 set-red" style="color:red;"></em> </p>';
					html += '</div></div>';
					//$('#filelist').append('<div id="' + file.id + '" class="mt10">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><a href="###" class="glyphicon glyphicon-remove remove-queue"></a></div>');
					$('#filelist').append(html);
				});
			},
			BeforeUpload: function(up, file) {
				MULTIPART_PARAMS['orig_size'] = file.origSize;
				MULTIPART_PARAMS['oldname'] = file.name;
			},
			UploadProgress: function(up, file) {
				//alert($.G.ObjectToString(up));
				$('#'+file.id).find('.progress').text(file.percent+'%');
			},
			FileUploaded: function(up, file, info) {
				//有点坑爹，返回的居然plupload自己解析成json字符串了，还要再解析回来
				response = $.parseJSON(info.response);
				//文件上传成功
				if(typeof response.status !== 'undefined' && response.status == 1000) 
				{
					var $div = $('#'+file.id);
					//修改队列上传图标-->完成
					$div.find('.glyphicon').removeClass('.glyphicon-minus-sign').addClass('glyphicon glyphicon-ok-sign');
				}
	    },
	
			Error: function(up, err) {
				response = $.parseJSON(err.response);
				$('#console').append("\nError #" + err.code + ": " + err.message+': '+response.msg);
			}
		}
	});
	
	uploader.init();
	$(function(){
		//移除上传队列
		$(document).on('click','.remove-queue',function(){
			$(this).closest('div').remove();
		});
	});
	</script>
</body>
</html>