<?php
return [
		'outside_type'=>[
			'document'=>'Simon\Document\Models\Document',
			'doubi'=>'Simon\Document\Models\Doubi',
		],
		'cache_rule'=>'{id}_{type}_{field}',//cache rule
		'open_cache'=>[
			'doubi'=>true,
		],
		
		
	'get_cache_time'=>86400,
	'post_cache_time'=>60*12,
		
	'doubi'=>[
		'outside_type'=>'Simon\Document\Models\Doubi',
		'open_get_cache'=>true,
		'open_post_cache'=>true,
	]
];