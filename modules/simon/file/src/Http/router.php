<?php
$router->controllers([
		'upload'=>'UploadController',
]);
Route::get('image/{template}/{filename}','ImageController@getImage');