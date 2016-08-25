<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 13:20
 */

use Illuminate\Support\Facades\Route;

$router->post('auth/register','AuthController@postRegister');


Route::group(['prefix'=>'user','middleware'=>['user']],function($router){

    $router->get('/','UserController@getIndex');

});

//user manage
Route::group(['prefix'=>'manage'],function($router){

    $router->resource('users','Manage\UserController');

});
