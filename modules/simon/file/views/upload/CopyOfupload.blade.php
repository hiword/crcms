<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>文件上传</title>
	<link  rel="stylesheet" href="{{static_asset('vendor/plupload/2.1.8/jquery.ui.plupload/css/jquery.ui.plupload.css')}}" />
	<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/smoothness/jquery-ui.min.css" media="screen" />
</head>
<body>
	<div id="uploader">
    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
</div>
 

	<script src="{{static_asset('vendor/jquery/jquery-2.1.3.min.js')}}"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://www.plupload.com/plupload/js/plupload.full.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="http://www.plupload.com/plupload/js/jquery.ui.plupload/jquery.ui.plupload.js" charset="UTF-8"></script>
	<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    $("#uploader").plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "/examples/upload",
 
        // Maximum file size
        max_file_size : '2mb',
 
        chunk_size: '1mb',
 
        // Resize images on clientside if we can
        resize : {
            width : 200,
            height : 200,
            quality : 90,
            crop: true // crop to exact dimensions
        },
 
        // Specify what files to browse for
        filters : [
            {title : "Image files", extensions : "jpg,gif,png"},
            {title : "Zip files", extensions : "zip,avi"}
        ],
 
        // Rename files by clicking on their titles
        rename: true,
         
        // Sort files
        sortable: true,
 
        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,
 
        // Views to activate
        views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs'
        },
 
        // Flash settings
        flash_swf_url : '{{"vendor/plupload/2.1.8/Moxie.swf"}}',
     
        // Silverlight settings
        silverlight_xap_url : '{{"vendor/plupload/2.1.8/Moxie.xap"}}'
    });
});
</script>
	<script>
	
	//获取session_id
// 	var SESSION_ID = '{{session()->getId()}}';
// 	var CSRF_TOKEN = '{{csrf_token()}}';
	
// 	var MULTIPART_PARAMS = {
// 		SESSION_ID:SESSION_ID,
// 		_token:CSRF_TOKEN
// 			//rand:math
// 	};
		
// 	var uploader = new plupload.Uploader({
// 		runtimes : 'html5,flash,silverlight,html4',//html5,flash,silverlight,html4
// 		browse_button : 'select-file', // you can pass in id...
// 		container: document.getElementById('local-container'), // ... or DOM Element itself
// 		url:'{{url("upload/upload")}}',
// 		flash_swf_url : '{{"vendor/plupload/2.1.8/Moxie.swf"}}',
// 		silverlight_xap_url : '{{"vendor/plupload/2.1.8/Moxie.xap"}}',
// 	  unique_names:true,
// 		chunk_size: '{{$config["allowfilesize"]}}',
// 		multipart_params:MULTIPART_PARAMS,
// 		filters : {
// 			//根据不同类型设置
// 			max_file_size : '100mb',
// 	    //根据不同类型设置
// 			mime_types: [
// 				{title : "allow files", extensions : "{{implode(',',$config['allowexttype'])}}"},
// 			],
// 			//允许上传的数目，根据不同类型设置
// 		},
// 		init: {
// 			PostInit: function() {
// 				$('#filelist').html('');
// 				$('#upload-file').on('click',function(){
// 					uploader.start();
// 					return false;
// 				});
// 			},
	
// 			FilesAdded: function(up, files) {
// 				var html = '';
// 				plupload.each(files, function(file) {
// 					html = '<div class="col-xs-3 s-list" id="' + file.id + '">';
// 					var extension = file.name.split('.');
// 					html += '<p class="thumb">'+extension[extension.length-1]+'</p>';
// 					html += '<a class="glyphicon glyphicon-minus-sign list-del remove-queue" href="###"></a>';
// 					html += '<div class="info">';
// 					html += '<p class="mt5">' + file.name + ' </p><p>' + plupload.formatSize(file.size) + '<em class="progress ml5 set-red"></em> </p>';
// 					html += '</div></div>';
// 					//$('#filelist').append('<div id="' + file.id + '" class="mt10">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><a href="###" class="glyphicon glyphicon-remove remove-queue"></a></div>');
// 					$('#filelist').append(html);
// 				});
// 			},
// 			BeforeUpload: function(up, file) {
// 				MULTIPART_PARAMS['orig_size'] = file.origSize;
// 				MULTIPART_PARAMS['oldname'] = file.name;
// 			},
// 			UploadProgress: function(up, file) {
// 				//alert($.G.ObjectToString(up));
// 				$('#'+file.id).find('.progress').text(file.percent+'%');
// 			},
// 			FileUploaded: function(up, file, info) {
// 				//有点坑爹，返回的居然plupload自己解析成json字符串了，还要再解析回来
// 				response = $.parseJSON(info.response);
// 				//文件上传成功
// 				if(typeof response.status !== 'undefined' && response.status == 1000) 
// 				{
// 					var $div = $('#'+file.id);
// 					//修改队列上传图标-->完成
// 					$div.find('.glyphicon').removeClass('.glyphicon-minus-sign').addClass('glyphicon glyphicon-ok-sign');
// 				}
// 	    },
	
// 			Error: function(up, err) {
// 				response = $.parseJSON(err.response);
// 				$('#console').append("\nError #" + err.code + ": " + err.message+': '+response.msg);
// 			}
// 		}
// 	});
	
// 	uploader.init();
// 	$(function(){
// 		//移除上传队列
// 		$(document).on('click','.remove-queue',function(){
// 			$(this).closest('div').remove();
// 		});
// 	});
	</script>
</body>
</html>

