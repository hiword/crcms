<?php
Route::get('image/original/{filename}',['as'=>'img_src','uses'=>'ImageController@getOriginal']);
Route::get('image/{template}/{filename}',['as'=>'template_img_src','uses'=>'ImageController@getImage']);
$router->controllers([
	'upload'=>'UploadController',
]);