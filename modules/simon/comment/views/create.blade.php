<!-- 
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	 -->
	<style type="text/css">
		.comment-action {margin-top: 20px;}
		.comment-action .face-action,.comment-action .face-action:hover
		{
			color:#666666;
			text-decoration:none;
		}
		.icons
		{
			background-color: #eeeeee;
		    line-height: 0;
		    padding: 3px 5px;
		    position: relative;
			margin-top:10px;
		}
		.icons::after {
		    border-bottom: 5px solid #eeeeee;
		    border-left: 5px solid rgba(0, 0, 0, 0);
		    border-right: 5px solid rgba(0, 0, 0, 0);
		    content: "";
		    height: 0;
		    left: 20px;
		    position: absolute;
		    top: -5px;
		    vertical-align: top;
		    width: 0;
		}
		.icons img {
		    cursor: pointer;
		    display: inline-block;
		    padding: 3px;
		}
	</style>
	<!-- 
</head>
<body> -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">发表评论</h3>
	</div>
	<div class="panel-body">
		<div id="comment-box" contenteditable="true" placeholder="写点什么..." name="content" onkeydown="(event.ctrlKey &amp;&amp; event.keyCode== 13) ? $('#submit_post').trigger('click') : '';" class="form-control" style="height: 70px;overflow-y:auto;"></div>
		<div class="clearfix comment-action">
			<form id="comment-form" action="{{url('comment/store')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<a href="###" status="close" class="face-action pull-left"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;表情</a>
				<button type="submit" class="pull-right btn btn-primary btn-sm">发表评论</button>
			</form>
		</div>
		<div class="icons" style="display: none;">
			@for($i=0;$i<$img_num;$i++)
			<img src="{{$img_path.'/'.$i.'.gif'}}" id="[#{{$i}}#]" alt="" />
			@endfor
		</div>
	</div>
</div>
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<!-- 
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
 -->
<script>
$(function(){
	$('.face-action').on('click',function(){
		if($(this).attr('status') === 'close')
		{
			$(this).attr('status','open');
			$('.icons').show();
		}
		else
		{
			$(this).attr('status','close');
			$('.icons').hide();
		}
		return false;
	});

	$('.icons img').on('click',function(){
		var src = $(this).attr('src');
		$('#comment-box').append('<img src="'+src+'" alt="" />');
	});

	$('#comment-form').on('submit',function(){
		alert('功能待开发中！');
		return false;
	});
});

</script>
<!-- 
</body>
</html>
 -->
