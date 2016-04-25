<!doctype html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<script src="{{static_asset('fingerprint.js')}}"></script>
</head>
<body>
	<script>
	window.onload = function(){
		var fingerprint = new Fingerprint({canvas: true}).get();
		alert(fingerprint);
	}

	</script>
</body>
</html>