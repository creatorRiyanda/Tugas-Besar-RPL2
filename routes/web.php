<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function(){
	return view('login');
})->name('login');

Route::get('/admin/login', function(){
	return view('admin.login');
})->name('admlogin');

Route::get('/mitra/login', function(){
	return view('mitra.login');
})->name('mtrlogin');


Route::get('/register', function(){
	return view('register');
})->name('register');
Route::get('/mitra/register', function(){
	return view('mitra.register');
})->name('mitra.register');


Route::get('/logout', 'AuthController@logout');
Route::post('/login', 'AuthController@login');
Route::post('/admin/login', 'AuthController@login');
Route::post('/mitra/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
Route::post('/mitra/register', 'AuthController@register');
Route::get('/lupa-password', function(){
	return view('lupa-password');
});
Route::post('/lupa-password', 'HomeController@lupaPassword');

//Reset Password
Route::get('/reset-password', function(){
	return view('user.reset-password');
});
Route::post('/reset-password', 'HomeController@resetPassword');

Route::get('/', 'HomeController@index');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
	Route::get('/checkout', 'HomeController@checkoutView');
	Route::post('/checkout', 'HomeController@checkoutPost');
	Route::get('/my-account', 'HomeController@myAccount');
	Route::get('/change-password', function(){
		return view('user.change-password');
	});
	Route::post('/change-password', 'HomeController@changePw');
});

Route::group([ 'prefix' => 'admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'Admin\HomeController@index');


	//Category
	Route::get('add-category', 'Admin\HomeController@addCategoryView');
	Route::post('add-category', 'Admin\HomeController@addCategoryPost');
	Route::post('delete-category', 'Admin\HomeController@deleteCategory');
	Route::get('edit-category/{category_id}', 'Admin\HomeController@editCategoryView');
	Route::post('edit-category/{category_id}', 'Admin\HomeController@addCategoryPost');

	//Data Laundry
	Route::get('/list-datalaundry', 'Admin\HomeController@listDataLaundry');
	Route::post('/delete-datalaundry', 'Admin\HomeController@deleteLaundry');
	
	//Alamat
	Route::get('add-alamat', 'Admin\HomeController@indexAlamat');
	Route::post('add-alamat', 'Admin\HomeController@saveAlamat');

	//User
	Route::get('/list-user', 'Admin\HomeController@listUser');
	Route::get('/list-user/edit/{user_id}', 'Admin\HomeController@editUser');
	Route::post('/list-user/edit/{user_id}', 'Admin\HomeController@editUserPost');
});

Route::group([ 'prefix' => 'mitra', 'middleware' => 'auth'], function () {
	Route::get('/', 'Mitra\HomeController@index');

	//datalaundry
	Route::get('datalaundry', 'Mitra\HomeController@settingDataLaundry');
	Route::post('datalaundry', 'Mitra\HomeController@settingDataLaundryPost');
	Route::get('edit-product/{product_id}', 'Mitra\HomeController@editProductView');
	Route::post('edit-product/{product_id}', 'Mitra\HomeController@addProductPost');
	Route::post('delete-product', 'Mitra\HomeController@deleteProduct');

	//jenis paket
	Route::get('jenis_paket', 'Mitra\HomeController@laundryTypeIndex');
	Route::post('jenis_paket', 'Mitra\HomeController@laundryTypeCreate');
	Route::post('delete_jenis_paket', 'Mitra\HomeController@deletelaundryType');
	// Route::post('add-category', 'Mitra\HomeController@addCategoryPost');
	// Route::post('delete-category', 'Mitra\HomeController@deleteCategory');
	// Route::get('edit-category/{category_id}', 'Mitra\HomeController@editCategoryView');
	// Route::post('edit-category/{category_id}', 'Mitra\HomeController@addCategoryPost');

	//Transaksi
	Route::get('list-transaksi', 'Mitra\HomeController@indexTransaksi');
	Route::get('edit-transaksi/{transaksi_id}', 'Mitra\HomeController@editTransaksi');
	Route::post('edit-transaksi/{transaksi_id}', 'Mitra\HomeController@editTransaksiPost');
	Route::post('delete-transaksi', 'Mitra\HomeController@deleteTransaksi');
});