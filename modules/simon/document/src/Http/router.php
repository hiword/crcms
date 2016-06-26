<?php
$router->get('/{cid?}','DocumentController@getIndex')->where(['cid'=>'[1-9][\d]*']);
$router->get('show/{did}','DocumentController@getShow')->where(['did'=>'[1-9][\d]*']);

$router->get('d/{cid}',['as'=>'doubi','uses'=>'DoubiController@getIndex'])->where(['cid'=>'[1-9][\d]*']);
$router->get('d/show/{did}',['as'=>'doubi_detail','uses'=>'DoubiController@getShow'])->where(['did'=>'[1-9][\d]*']);
// $router->get('test','DocumentController@getTest');
$router->controllers([
	'manage/category'=>'Manage\CategoryController',
	'manage/document'=>'Manage\DocumentController',
	'manage/doubi'=>'Manage\DoubiController',
// 	'document/api'=>'ApiController',
// 	'document'=>'DocumentController',
]);

