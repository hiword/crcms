<?php 
function comment_tree_view($model)
{
	$string = <<<string
	<div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="..." alt="...">
    </a>
  </div>
  <div class="media-body">
  	<!--
    <h4 class="media-heading">Media heading</h4>
    -->
    {$model->content}
  </div>
</div>
string;
}
    
function comment_tree($models,$id = 0)
{
	foreach ($models as $model)
	{
		!isset($model['append']) && $model['append'] = [];
		if ($model['reply_id'] <> 0)
		{
			$model['append'] = comment_tree($model);
		}
		
	}
}
?>
