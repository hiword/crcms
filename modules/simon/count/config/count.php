<?php
return [
		'outside_type'=>[
			'document'=>'Simon\Document\Models\Document',
			'doubi'=>'Simon\Document\Models\Doubi',
		],
		'cache_rule'=>'{id}_{type}_{field}',//cache rule
		'open_cache'=>true,
];