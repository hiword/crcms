<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('meta')
	<title>{{config('site.web_name')}}</title>
	<link rel="stylesheet" href="{{static_asset('static/bootstrap/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{static_asset('static/common/css/global.css')}}" />
	<link rel="stylesheet" href="{{static_asset('static/common/css/bootstrap.custom.css')}}" />
	@yield('style')
</head>
<body>
	@yield('body')
	@section('script')
		<script src="{{static_asset('static/common/js/jquery-2.1.3.min.js')}}"></script>
		<script src="<?php echo static_asset('static/bootstrap/js/bootstrap.min.js')?>"></script>
		<script src="{{static_asset('static/artdialog/6.0.2/js/dialog-plus-min.js')}}"></script>
		<script src="{{static_asset('static/common/js/common.js')}}"></script>
		<script>
			$.ajaxSetup({
		  	    headers: {
		  	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	    }
		  	});
		</script>
	@show
</body>
</html>