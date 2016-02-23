<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>文件上传</title>
	<link rel="stylesheet" href="{{static_asset('/vendor/bootstrap/css/bootstrap.min.css')}}" />
	<style type="text/css">
           div.upload {
	           padding:50px;
                border:3px dashed #CCCCCC;
           }
           .info {margin-top:20px;}
    </style>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="upload">
            <button class="btn-lg btn btn-success">上传文件</button>
            <p class="info">最大允许上传：2M</p>
        </div>
    </div>
	<script src="{{static_asset('/vendor/jquery/jquery-2.1.3.min.js')}}"></script>
	<script>
	</script>
</body>
</html>