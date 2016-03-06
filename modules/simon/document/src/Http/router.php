<?php
$router->get('{cid?}','DocumentController@getIndex')->where(['cid'=>'[1-9][\d]*']);
$router->get('show/{did}','DocumentController@getShow')->where(['did'=>'[1-9][\d]*']);
$router->controllers([
	'manage/category'=>'Manage\CategoryController',
	'manage/document'=>'Manage\DocumentController',
]);

