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
	Route::post('/signup', 'ApiController\userController@signup');
	Route::post('/signin', 'ApiController\userController@signin');
			Route::group(['middleware' => 'jwt.auth'], function(){
					Route::post('/beasiswa/create', 'ApiController\beasiswaController@create');
					Route::post('/logout', 'ApiController\userController@logout');
					Route::post('/user/aktivasi', 'ApiController\userController@aktivasi');
				});
			Route::get('/history/{id}', 'ApiController\historyController@index'); 
			Route::get('/user', 'ApiController\userController@index');
			Route::post('/user/facilitator/add', 'ApiController\userController@createFacilitator');
			Route::post('/user/update', 'ApiController\userController@update');
			Route::get('/beasiswa', 'ApiController\beasiswaController@show'); 
		 
			Route::get('/beasiswa/priority','ApiController\beasiswaController@priority');
			Route::post('beasiswa/search', 'ApiController\beasiswaController@search');
			Route::get('/beasiswa/{id}', 'ApiController\beasiswaController@single');
			Route::get('/kategori', 'ApiController\categoryController@show');
			Route::get('/kategori/{name}', 'ApiController\categoryController@single');
	
});