<button class="btn btn-lg btn-primary" id="single-upload"><i class="glyphicon glyphicon-cloud-upload" style="margin-right: 5px"></i><span id="upload-show-text"></span></button>
<div class="upload-info text-center"></div>
<div id="upload-value"></div>
<script src="{{static_asset('vendor/jquery/jquery-2.1.3.min.js')}}"></script>
<script src="{{static_asset('vendor/plupload/2.1.8/plupload.full.min.js')}}"></script>
<script>
var uploadBtnId = 'single-upload';
var uploadShowId = '#upload-show-text';
var uploadInitShowText = '点击上传文件';

var MULTIPART_PARAMS = {
	SESSION_ID:'{{session()->getId()}}',
	_token:'{{csrf_token()}}',
	'_json':1,
};

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',//html5,flash,silverlight,html4
	browse_button : uploadBtnId, // you can pass in id...
	url:'{{url("upload/upload")}}',
	flash_swf_url : '{{"vendor/plupload/2.1.8/Moxie.swf"}}',
	silverlight_xap_url : '{{"vendor/plupload/2.1.8/Moxie.xap"}}',
  	unique_names:true,
	chunk_size: '{{$config["filesize"]}}',
	multipart_params:MULTIPART_PARAMS,
	filters : {
		//根据不同类型设置
		max_file_size : '{{$config["filesize"]}}',
    	//根据不同类型设置
		mime_types: [
			{title : "allow files", extensions : "{{implode(',',$config['extensions'])}}"},
		],
	},
	multi_selection:false
});

//上传初始化
uploader.bind('PostInit',function(){
	$(uploadShowId).text(uploadInitShowText);
});

uploader.bind('FilesAdded',function(up, files){
	//单文件添加完成后直接上传
	$('#'+uploadBtnId).prop('disabled',true);
	uploader.start();
});

uploader.bind('BeforeUpload',function(up, file) {
	MULTIPART_PARAMS['orig_size'] = file.origSize;
	MULTIPART_PARAMS['oldname'] = file.name;
});

//上传进度
uploader.bind('UploadProgress',function(up, file) {
	$(uploadShowId).text(file.percent+'%');
});

//文件上传
uploader.bind('FileUploaded',function(up, file, info) {
	//有点坑爹，返回的居然plupload自己解析成json字符串了，还要再解析回来
	response = $.parseJSON(info.response);
	//文件上传成功
	if(typeof response.app_code !== 'undefined' && response.app_code == 1000) 
	{
		$(uploadShowId).text('上传完成');
		
		$('#upload-value').append('<input type="hidden" name="uploads[][src]" extension="'+response.data.extension+'" path="'+response.data.full_root+'" value="'+response.data.img_src+'" />');
		$('#upload-value').append('<input type="hidden" name="uploads[][hash]" value="'+response.data.hash+'" />');
		$('#upload-value').append('<input type="hidden" name="uploads[][extension]" value="'+response.data.extension+'" />');

		//执行上传完成后的操作文件
		if(typeof uploaded_single_handle === 'function')
		{
			uploaded_single_handle(response.data);
		}
	}
});

//上传完成后初始化状态
uploader.bind('UploadComplete',function(up,file){
	setTimeout(function(){
		$('#'+uploadBtnId).prop('disabled',false);
		$(uploadShowId).text(uploadInitShowText);
	},1000);
});

uploader.bind('Error',function(up, err) {
	response = $.parseJSON(err.response);
	$('.upload-info').text("\nError #" + err.code + ": " + err.message+': '+response.app_message+' ('+response.app_code+')');
});

uploader.init();
</script>
