<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/beasiswa/{name}', 'HomeController@single')->name('single');
Route::get('/daftar/{id}', 'HomeController@daftar')->name('daftar');





Route::prefix('setting')->group(function () {
		Route::group(["middleware" => "admin"], function(){
			Route::get('/dashboard', 'AdminController\adminController@index')->name('dashboard');
			Route::get('/profile', 'AdminController\profileController@index')->name('profile');
			Route::put('/profile/update/', 'AdminController\profileController@update')->name('updateProfile');
			Route::get('/organizer', 'AdminController\profileController@organizer')->name('organizer');
			Route::get('/list', 'AdminController\scholarshipController@index')->name('scholarshipList');
			Route::get('/list/{id}', 'AdminController\scholarshipController@show')->name('singleList');
			Route::get('/list/update/{id}', 'AdminController\scholarshipController@edit')->name('editList');
			Route::get('/list/delete/{id}', 'AdminController\scholarshipController@delete')->name('deleteList');
			Route::put('/list/update/{id}', 'AdminController\scholarshipController@update')->name('updateList');
			Route::get('/create', 'AdminController\scholarshipController@create')->name('scholarshipCreate');
			Route::post('/create', 'AdminController\scholarshipController@store')->name('createScholarship');
		});		
});

Route::group(["middleware" => "user"], function(){
	Route::get('/user/{username}', 'singleUserController\singleUserController@index')->name('single-user');
});
