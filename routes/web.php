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

Route::get('/', function () {
	return view('Master.layout.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

	Route::resource('MasterMenu','Master\MasterMenuController',['except' => ['show']]);
	Route::delete('MasterMenuDeleteAll', 'Master\MasterMenuController@deleteAll');
	Route::post('MasterMenu/filter', 'Master\MasterMenuController@index');

	Route::resource('MasterRole','Master\RoleController',['except' => ['show']]);
	Route::delete('MasterRoleDeleteAll', 'Master\RoleController@deleteAll');
	Route::post('MasterRole/filter', 'Master\RoleController@index');
	
	Route::resource('MasterUserLogin','Master\UserController',['except' => ['show']]);
	Route::delete('MasterUserLoginDeleteAll', 'Master\UserController@deleteAll');
	Route::post('MasterUserLogin/filter', 'Master\UserController@index');

	Route::post('MasterUserLogin/resetpassword', 'Master\UserController@resetPassword')->name('MasterUserLogin.resetPassword');
	
	Route::resource('MasterUsers','Master\MasterUserController',['except' => ['show']]);
	Route::delete('MasterUsersDeleteAll', 'Master\MasterUserController@deleteAll');
	Route::post('MasterUsers/filter', 'Master\MasterUserController@index');

	Route::resource('UserClients','Master\UserClientController',['except' => ['show']]);
	Route::delete('UserClienstDeleteAll', 'Master\UserClientController@deleteAll');
	Route::post('UserClients/filter', 'Master\UserClientController@index');

	Route::resource('MasterGames','Master\MasterMasterGameController',['except' => ['show']]);
	Route::delete('MasterGamesDeleteAll', 'Master\MasterGameController@deleteAll');
	Route::post('MasterGames/filter', 'Master\MasterGameController@index');
	
	// Route::resource('Transactions','Master\TransactionController',['except' => ['show']]);
	// Route::delete('TransactionsDeleteAll', 'Master\TransactionController@deleteAll');
	// Route::post('Transactions/filter', 'Master\TransactionController@index');

	Route::resource('OptionGroup','Master\OptionGroupController',['except' => ['show']]);
	Route::delete('OptionGroupDeleteAll', 'Master\OptionGroupController@deleteAll');
	Route::post('OptionGroup/filter', 'Master\OptionGroupController@index');

	Route::resource('LogActivity','Master\LogActivityController', ['only' => ['index', 'destroy']]);
	Route::post('LogActivity/filter', 'Master\LogActivityController@index');
	Route::delete('LogActivityDeleteAll', 'Master\LogActivityController@deleteAll');

	Route::resource('Pengaturan','Master\PengaturanController');




	Route::resource('Produk','ProdukController');
	Route::delete('ProdukDeleteAll', 'ProdukController@deleteAll');
	Route::post('Produk/filter', 'ProdukController@index');
	Route::get('Produk/{id}/varian','ProdukController@varian');
	Route::post('Produk/varianstore','ProdukController@varianstore')->name('Produk.varianstore');
	Route::put('Produk/varianupdate/{id}','ProdukController@varianupdate')->name('produk.varianupdate');

	Route::resource('Kategori','KategoriController',['except' => ['show']]);
	Route::delete('KategoriDeleteAll', 'KategoriController@deleteAll');
	Route::post('Kategori/filter', 'KategoriController@index');


});
