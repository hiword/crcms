<?php
return [
	'theme'=>env('SITE_THEME','default'),
	'index'=>env('SITE_INDEX','App\Http\Controllers\IndexController@getIndex'),
];