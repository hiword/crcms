<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 13:20
 */

$router->post('auth/register','AuthController@postRegister');


\Illuminate\Support\Facades\Route::group(['prefix'=>'manage'],function($router){

    $router->resource('users','Manage\UserController');

});
