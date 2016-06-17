<?php 
header("Content-type: text/html; charset=utf-8");
ini_set("display_errors", "Off");
error_reporting(E_ERROR);
include 'config.php';
$file = $_FILES['file'];
if (!empty($file))
{
	$finfo = new finfo();
	$mime = $finfo->file($file['tmp_name'],FILEINFO_MIME_TYPE);
	//'application/zip','text/plain','application/x-javascript'
if (!in_array($mime, array('image/jpeg','image/gif','image/png'),true))
	{
		exit('不允许上传的文件类型！');
	}
	if ($file['size'] > 1048576)
	{
		exit('文件过大！');
	}
	if (!is_uploaded_file($file['tmp_name']))
	{
		exit('非法上传！');
	}
	$extension = pathinfo($file['name'],PATHINFO_EXTENSION);
	$filepath = $CONFIG['upload_path'].uniqid().'.'.$extension;
	
	$content = file_get_contents($file['tmp_name']);
	if(stripos($content,'<?') === false || stripos($content,'eval') === false)
	{
		exit('文件格式不正确');
	}
	
	if (move_uploaded_file($file['tmp_name'], $filepath))
	{
		file_put_contents($filepath, md5('__success'));
		exit('恭喜，答案是：'.md5('__success')) ;
// 		echo '上传成功当前路径',realpath($filepath);
	}
	else
	{
		exit('文件移动失败，请联系管理员！') ;
	}
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>文件上传测试</title>
	<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>文件上传测试</h2>
		<div class="alert alert-success">
			<p>1、只允许上传jpg,jpeg,gif,png类型的文件</p>
			<p>2、文件上传大小不允许超过1M</p>
			<p>3、必须包含PHP类型的webShell，使用eval函数</p>
		</div>
		<form id="_form" action="" method="post"  enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" name="file" />
			</div>
			<button type="submit" class="btn btn-success">Submit</button>
		</form>
	</div>
	<!-- jQuery文件。务必在bootstrap.min.js 之前引入-->
	<script src="./jquery_1.11.3_jquery.min.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="./bootstrap/js/bootstrap.min.js"></script>
	<script>
	$(function(){
		$('#_form').on('submit',function(){
			var filepath=$("input[name='file']").val();
			var extStart=filepath.lastIndexOf(".");
			var ext=filepath.substring(extStart,filepath.length).toUpperCase();
			   if(ext!=".BMP"&&ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			     alert("图片限于bmp,png,gif,jpeg,jpg格式"); //检测允许的上传文件类型
			     return false;
			}
		});
	});
	</script>
</body>
</html>
