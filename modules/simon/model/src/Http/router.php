<?php
$router->controllers([
	'manage/model'=>'Manage\ModelController',
	'manage/field'=>'Manage\FieldController',
	'manage/element'=>'Manage\ElementController',
]);
$router->get('manage/s','TestController@getTest');
