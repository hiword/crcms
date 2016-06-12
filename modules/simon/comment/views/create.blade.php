<!-- 
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 -->
	<style type="text/css">
		
	</style>
	<!-- 
</head>
<body> -->
<div id="comments">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">发表评论</h3>
		</div>
		<div class="panel-body">
			<form action="{{url('comment/store')}}" method="post">
				<textarea placeholder="写点什么..." name="content"  onkeydown="(event.ctrlKey &amp;&amp; event.keyCode== 13) ? $('#submit_post').trigger('click') : '';" class="comment-box form-control" style="height: 70px;overflow-y:auto;"></textarea>
				<!-- 
				<div contenteditable="true" placeholder="写点什么..." name="content" onkeydown="(event.ctrlKey &amp;&amp; event.keyCode== 13) ? $('#submit_post').trigger('click') : '';" class="comment-box form-control" style="height: 70px;overflow-y:auto;"></div>
				 -->
				<div class="clearfix comment-action">
					<input type="hidden" name="_token" value="{{csrf_token()}}" />
					<input type="hidden" name="outside_id" value="{{$outside_id}}" />
					<input type="hidden" name="outside_type" value="{{$outside_type}}" />
					<a href="###" status="close" class="face-action pull-left"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;表情</a>
					<button type="button" class="comment-btn pull-right btn btn-primary btn-sm">发表评论</button>
					<button type="reset" class="comment-btn-reset" style="display: none">reset</button>
				</div>
				<div class="icons" style="display: none;">
					@for($i=0;$i<$img_num;$i++)
					<img src="{{$img_path.'/'.$i.'.gif'}}" show-id="[#{{$i}}#]" alt="" />
					@endfor
				</div>
			</form>
		</div>
	</div>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<!-- 
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
 -->
<script>


</script>
<!-- 
</body>
</html>
 -->
