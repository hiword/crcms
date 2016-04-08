<?php

use App\Exceptions\AppException;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return redirect('/b')->withErrors(['a'=>'a','b'=>'b'],'s')->withErrors(['c'=>'c','b'=>'d'],'k');
// 	throw new AppException('abc');
// });
// Route::get('/','Simon\Document\DocumentController@getIndex');
Route::get('/b',function(){
	return view('welcome');
});