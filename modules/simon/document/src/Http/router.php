<?php
$router->get('/','DocumentController@getIndex');
$router->get('/{id}','DocumentController@getShow')->where(['id'=>'[1-9][\d]*']);
$router->get('manage/abc','AbcController@getIndex');
$router->controllers([
	'abc'=>'AbcController',	
]);

$router->controllers([
	'manage/category'=>'Manage\CategoryController',
	'manage/document'=>'Manage\DocumentController',
]);

