<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'api'], function(){
	Route::post('/signup', 'userController@signup');
	Route::post('/signin', 'userController@signin');
			Route::group(['middleware' => 'jwt.auth'], function(){
					Route::get('/history', 'historyController@index'); 
					Route::post('/beasiswa/create', 'beasiswaController@create');
					Route::post('/logout', 'userController@logout');
				});
			Route::get('/user', 'userController@index');
			Route::post('/user/facilitator/add', 'userController@createFacilitator');
			Route::post('/user/update', 'userController@update');
			Route::get('/beasiswa', 'beasiswaController@show'); 
		 
			Route::get('/beasiswa/priority','beasiswaController@priority');
			Route::post('beasiswa/search', 'beasiswaController@search');
			Route::get('/beasiswa/{id}', 'beasiswaController@single');
			Route::get('/kategori', 'categoryController@show');
			Route::get('/kategori/{name}', 'categoryController@single');
	
});