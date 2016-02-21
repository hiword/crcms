<?php if (!defined('CRCMS')) exit();?>
<!doctype html>
<html>
<head>
<include file="./Public/tpl/theme/default/global_meta.php" />
<title><?php echo WEB_NAME?> - <?php echo CRCMS_VERSION;?></title>
<include file="./Public/tpl/common/global_load.php" />
<include file="./Public/tpl/theme/default/global_header.php" />
<link rel="stylesheet" href="__PUBLIC_STATIC__/theme/default/css/attachment.css" />
<style>
	body {
	width:550px;height:350px;margin:0px auto;
		border:1px solid #CCCCCC;
	}
	
</style>
</head>
<body class="c-main">
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  	<li class="active"><a href="#local" role="tab" data-toggle="tab">本地上传</a></li>
  	<li><a href="#net" role="tab" data-toggle="tab">网络文件</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="local">
		<p class="mt15">允许上传的文件类型：<span class="set-red">*.jpg;*.gif;*.jpeg;*.png;*.php;</span></p>
		<p class="mt10">一次最多上传<span class="set-red">1</span>个附件,单文件最大<span class="set-red">1MB</span></p>
		<div id="local-container" class="mt15">
			<div>
		    		<button type="button" class="btn btn-primary btn-sm" id="select-file">选择文件</button>
		    		<button type="button" class="btn btn-success btn-sm ml10" id="upload-file">点击上传</button>
	    		</div>
	    		<div id="console"></div>
	    		<div id="filelist" class="row filelist mt10"></div>
	    		<!-- 
	    		<div class="col-xs-3 s-list">
	    				<p class="thumb">zip</p>
	    				<a class="glyphicon glyphicon-remove-sign list-del remove-queue" href="###"></a>
	    				<div class="info">
	    					<p class="mt5">plupload-2.1.2(1).zip </p>
	    					<p>354 kb </p>
	    				</div>
	    			</div>
	    		 -->
	    	</div>
	</div>
	<div class="tab-pane" id="net">2222222222..</div>
</div>
<include file="./Public/tpl/theme/default/global_footer.php" />
<script src="__PUBLIC_STATIC__/plupload/2.1.2/js/plupload.full.min.js"></script>
<script>
$.ajaxSetup({async:false});
//获取session_id
var SESSION_ID = null;
$.get('<?php echo $domain.'/'.C('UPLOADS_SESSION_URL'); ?>',{token:'<?php echo $remote_token;?>',rand:'<?php echo $remote_rand; ?>'},function(data){
	SESSION_ID = data;
},'text');


var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',//html5,flash,silverlight,html4
	browse_button : 'select-file', // you can pass in id...
	container: document.getElementById('local-container'), // ... or DOM Element itself
	//url : '<?php echo U('Attachment/Index/upload_','',true,true)?>',
	url:'<?php echo $domain.'/'.C('UPLOADS_URL'); ?>',
	//url:'http://test.cs/uploads.php',
	flash_swf_url : '__PUBLIC_STATIC__/plupload/2.1.2/swf/Moxie.swf',
	silverlight_xap_url : '__PUBLIC_STATIC__/plupload/2.1.2/xap/Moxie.xap',
     unique_names:true,
	chunk_size: '<?php echo C('CHUNK_SIZE'); ?>',
	//unique_names :true,
	multipart_params:{
		SESSION_ID:SESSION_ID,
		token:'<?php echo $remote_token;?>',
		rand:'<?php echo $remote_rand; ?>'
	},
	// Resize images on clientside if we can
	/*
	resize : {
		width : 200, 
		height : 200, 
		quality : 90,
		crop: true // crop to exact dimensions
	},*/
	filters : {
		//根据不同类型设置
		max_file_size : '900mb',
       	//根据不同类型设置
		mime_types: [
			{title : "allow files", extensions : "jpg,gif,png,zip"},
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
				html += '<p class="mt5">' + file.name + ' </p><p>' + plupload.formatSize(file.size) + '<em class="progress ml5 set-red"></em> </p>';
				html += '</div></div>';
				//$('#filelist').append('<div id="' + file.id + '" class="mt10">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b><a href="###" class="glyphicon glyphicon-remove remove-queue"></a></div>');
				$('#filelist').append(html);
			});
		},

		BeforeUpload: function(up, file) {
			$.post('<?php echo $domain.'/'.C('GET_OLDNAME_URL');?>',{SESSION_ID:SESSION_ID,oldname:file.name,token:'<?php echo $remote_token;?>',rand:'<?php echo $remote_rand; ?>'});
		},

		UploadProgress: function(up, file) {
			//alert($.G.ObjectToString(up));
			$('#'+file.id).find('.progress').text(file.percent+'%');
		},

		FileUploaded: function(up, file, info) {
			//有点坑爹，返回的居然plupload自己解析成json字符串了，还要再解析回来
			response = $.parseJSON(info.response);
			//文件上传成功
			if(response.error === 0) {
				var $div = $('#'+file.id);
				//修改队列上传图标-->完成
				$div.find('.glyphicon').removeClass('.glyphicon-minus-sign').addClass('glyphicon glyphicon-ok-sign');
			}
         	},

		Error: function(up, err) {
			$('#console').append("\nError #" + err.code + ": " + err.message);
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
