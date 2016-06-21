<?php
return [
	'theme'=>env('SITE_THEME','skin1'),
	'index'=>env('SITE_INDEX','App\Http\Controllers\IndexController@getIndex'),
];