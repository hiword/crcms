<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="{{static_asset('fingerprint.js')}}"></script>
</head>
<body>
	<?php $bs = [3,4]?>
	@category(Request::url())
	<p><a href="{{url('/'.$category->id)}}">{{$category->name}}</a></p>
	@endcategory
	
</body>
</html>