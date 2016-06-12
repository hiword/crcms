
<?php 
function comment_tree_view($model)
{
	$time = format_date($model['created_at']);
	$name = isset($model['user']['name']) ? $model['user']['name'] : '匿名';
	$userid = isset($model['user']['id']) ? $model['user']['id'] : 0;
	$content = htmlspecialchars($model['content']);
	$string = <<<string
	<div class="media" list-id="{$model['id']}">
  <div class="media-left">
    <a href="#">
    <!--
      <img class="media-object" src="..." alt="...">
      -->
      <img class="media-object" alt="64x64" data-src="holder.js/64x64" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTUyZTkxYjc3YyB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NTJlOTFiNzdjIj48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxMi41IiB5PSIzNi44Ij42NHg2NDwvdGV4dD48L2c+PC9nPjwvc3ZnPg==" data-holder-rendered="true">
    </a>
  </div>
  <div class="media-body comment-body">
  	<!--
    <h4 class="media-heading">Media heading</h4>
    -->
    <p class="clearfix"><a href="###" class="user-name pull-left">{$name}</a><span class="pull-right time">{$time}</span></p>
    <p class="content">{$content}</p>
    <p class="next-action"><a href="###" class="reply" reply-userid="{$userid}" reply-id="{$model['id']}"><i class="glyphicon glyphicon-edit"></i>&nbsp;回复</a><a href="###"><i class="glyphicon glyphicon-thumbs-up"></i>&nbsp;顶</a></p>

string;
  return $string;
}
    
$strings = '';
function comment_tree($models) 
{
	static $strings;
	if (empty($strings) )
	{
		$strings = '';
	}
	
	foreach ($models as $values)
	{
		$string = '';
		if (isset($values['children']))
		{
			$string .= comment_tree($values['children']);
		}
		else
		{
			$string .= comment_tree_view($values);
		}
	}
	$string .= '</div>
</div>';
	$strings .= $string;
	return $string;
}

static $strings;
print $strings;
exit();
// function comment_tree($models,$id = 0)
// {
// 	foreach ($models as $model)
// 	{
// // 		!isset($model['append']) && $model['append'] = [];
// // 		if ($model['reply_id'] <> 0)
// // 		{
// // 			$model['append'] = comment_tree($model);
// // 		}
// 		print comment_tree_view($model);
// 	}
// }

?>
<style>

</style>
<div id="comments-list" class="comments-list"><?php  //comment_tree(array_tree_child($models,0,'reply_id'));?></div>
<script>

</script>