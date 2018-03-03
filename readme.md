## Cara Penggunaan 

- Pertama pastiin dulu udah install composer ya bisa diliat disini lingknya **[composer](https://getcomposer.org/download/)**
- Kalo udah import dulu sql, nama databasenya api_kompress kalau mau diubah bisa diubah dari ENV nya
- Ekstrak filenya seluruhnya di htdocs terserah nama foldernya apa ga masalah
- Setelah di ekstrak buka cmd di direktori itu 
- Ketikin php artisan serve -> nanti dia bakalan ada started 127.0.0.1:8000 -> ini URLnya
- Sekarang siapin postmannya dulu, kalo belom punya bisa install lewat sini **[Postman](https://www.getpostman.com/)**
- Cara penggunaan postman gampang, abis install dkknya, bisa buka postmannya pilih metode nya dulu GET/POST
- Berikut ini URL yang udah tersedia di API ini
 ** POST localhost:8000/api/signup (header = accept : aplication/json, content-type : application/json) (body[ pilih raw ganti type menjadi JSON] = {"username" : "apa", "password" : "apa", "email" : "apa"})  **
 ** POST localhost:8000/api/signin (header = accept : aplication/json, content-type : application/json) (body[ pilih raw ganti type menjadi JSON] = {"username" : "apa", "password" : "apa"}) -> nanti bakalan keluar token **
 ** GET localhost:8000/api/user (header = accept : aplication/json, content-type : application/json, token : bearer tokentadi) -> nanti diakan keluar daftar user**
 ** POST localhost:8000/api/user/update (header = accept : aplication/json, content-type : application/json, token : bearer tokentadi)(body {"nama" : "apa ","alamat" : "apa","pendidikan" : "apa","telp" : "apa","role" : 1/2}) -> akan update userr**
 ** POST localhost:8000/api/user/update (header = accept : aplication/json, content-type : application/json, token : bearer tokentadi)(body {"nama_instansi" : "apa ","deskripsi_instansi" : "apa"}) -> akan menambahkan user dengan role 1 ke database**

	Route::post('/signup', 'userController@signup');
	Route::post('/signin', 'userController@signin');
		Route::group(['middleware' => 'jwt.auth'], function(){
			Route::get('/user', 'userController@index');
			Route::post('/user/facilitator/add', 'userController@createFacilitator');
			Route::post('/user/update', 'userController@update');
			Route::get('/beasiswa', 'beasiswaController@show');
			Route::get('/beasiswa/{id}', 'beasiswaController@single');

