<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" href="{{static_asset('static/bootstrap/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{static_asset('static/common/css/global.css')}}" />
	@yield('css')
</head>
<body>
	<div class="container-fluid">
		@yield('body')
	</div>
	@section('script')
	
	@show
	<script src="{{static_asset('static/common/js/jquery-2.1.3.min')}}"></script>
</body>
</html>