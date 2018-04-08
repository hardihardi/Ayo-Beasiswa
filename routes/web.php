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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
		Route::group(["middleware" => "admin"], function(){
			Route::get('/dashboard', 'AdminController\adminController@index')->name('dashboard');
			Route::get('/profile', 'AdminController\profileController@index')->name('profile');
			Route::get('/organizer', 'AdminController\profileController@organizer')->name('organizer');
			Route::get('/list', 'AdminController\scholarshipController@index')->name('scholarshipList');
			Route::get('/list/{id}', 'AdminController\scholarshipController@show')->name('singleList');
			Route::get('/create', 'AdminController\scholarshipController@create')->name('scholarshipCreate');
		});
});