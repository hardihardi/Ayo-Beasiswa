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

Route::get('/', 'HomeController@index')->name('root');

Auth::routes();

Route::get('hh', function(){
	return BHelper::create_dir("asda");
});

Route::get('/verify/{token}/{id}', 'Auth\RegisterController@verify_register');
Route::get('/verify_facilitator/{token}/{id}', 'AdminController\profileController@verify_facilitator');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/beasiswa', 'HomeController@show')->name('beasiswa');
Route::get('/beasiswa/{name}', 'HomeController@single')->name('single');
Route::get('/kategori/{kategori}', 'HomeController@kategori')->name('kategori');
Route::get('/beasiswa/', 'HomeController@getAll')->name('beasiswa');
Route::get('/daftar/{id}', 'HomeController@daftar')->name('daftar');
Route::post('cari', 'HomeController@cari')->name('cari');
Route::get('/maps', function(){
	return view('maps');
});

Route::prefix('setting')->group(function () {
		Route::group(["middleware" => "admin"], function(){
			Route::get('/dashboard', 'AdminController\adminController@index')->name('dashboard');
			Route::get('/profile', 'AdminController\profileController@index')->name('profile');
			Route::put('/profile/update/', 'AdminController\profileController@update')->name('updateProfile');
			Route::get('/organizer', 'AdminController\profileController@organizer')->name('organizer');
			Route::group(["middleware" => "facilitator"], function(){
				Route::get('/list', 'AdminController\scholarshipController@index')->name('scholarshipList');
				Route::get('/list/facilitator', 'AdminController\scholarshipController@facilitator')->name('facilitatorList');
				Route::get('/list/{id}', 'AdminController\scholarshipController@show')->name('singleList');
				Route::get('/list/update/{id}', 'AdminController\scholarshipController@edit')->name('editList');
				Route::get('/list/delete/{id}', 'AdminController\scholarshipController@delete')->name('deleteList');
				Route::put('/list/update/{id}', 'AdminController\scholarshipController@update')->name('updateList');
				Route::get('/create', 'AdminController\scholarshipController@create')->name('scholarshipCreate');
				Route::post('/create', 'AdminController\scholarshipController@store')->name('createScholarship');

				// sementara ini di bikin post karena butuh buat bikin modal pake ajax
				Route::post('/approve', 'AdminController\scholarshipController@approve')->name('adminApprove');
				Route::get('/approve/{id_beasiswa}/{id_user}/{status}', 'AdminController\scholarshipController@approveGet')->name('adminApproveGet');
				Route::get('/email/list', 'AdminController\adminController@email')->name('emailList');
				Route::post('/addEmail', 'AdminController\adminController@addEmail')->name('addEmail');
				Route::post('/sendEmail', 'AdminController\adminController@sendEmail')->name('sendEmail');
				Route::post('/getMessages', 'AdminController\adminController@getMessages')->name('getMessages');
			});
		});	

		Route::group(["middleware" => "superAdmin"], function(){
			Route::get('/superadmin', 'SuperAdminController\superAdminController@index')->name('superadmin');
			Route::get('/activateFacilitator/{id}/{status}', 'SuperAdminController\superAdminController@activate')->name('activateFacilitator');
			Route::get('/deleteFacilitator/{id}', 'SuperAdminController\superAdminController@delete')->name('deleteFacilitator');
			Route::get('/deleteEmail/{id}', 'SuperAdminController\superAdminController@deleteEmail')->name('deleteEmail');
			Route::get('/emailFacilitator', 'SuperAdminController\superAdminController@email')->name('emailFacilitator');
		});
});

Route::group(["middleware" => "user"], function(){
	Route::get('/user/{username}', 'UserController\userProfileController@index')->name('single-user');
	Route::get('/facilitator/{str_slug}', 'UserController\userProfileController@facilitator')->name('single-facilitator');
	Route::put('/user/update', 'UserController\userProfileController@update')->name('update-user');
	Route::post('/profile/create', 'AdminController\profileController@create')->name('profile_create');
	Route::post('/user/update', 'AdminController\profileController@update')->name('user_update');
	Route::put('/user/updatepass', 'UserController\userProfileController@updatepass')->name('updatePass');

	Route::get('/user/status/{id}', 'UserController\userProfileController@status')->name('user-status');
	Route::get('/user/cancel/{id}', 'UserController\userProfileController@cancelSchola')->name('cancel-schola');
	Route::post('/user/{id}/addscholar', 'UserController\userProfileController@addScholar')->name('addScholar');
	Route::put('/user/{id}/updateScholar', 'UserController\userProfileController@updateScholar')->name('updateScholar');

	Route::post('/user/upload_photo/', 'UserController\userProfileController@updatePhoto')->name('updatePhoto');
	Route::put('/user/upload_file/{file}', 'UserController\userProfileController@updatefile')->name('upload_file');
	Route::get('/user/delete_file/{id}/{kategori?}/{scholarship_id?}', 'UserController\userProfileController@deleteFile')->name('deleteFile');

});	
