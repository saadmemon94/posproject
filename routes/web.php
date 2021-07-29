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
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::resource('role', 'RoleController', ['except' => ['show']]);
	Route::resource('customer', 'CustomerController', ['except' => ['show']]);
	Route::resource('supplier', 'SupplierController', ['except' => ['show']]);
	Route::resource('category', 'CategoryController', ['except' => ['show']]);
	Route::resource('company', 'CompanyController', ['except' => ['show']]);
	Route::resource('brand', 'BrandController', ['except' => ['show']]);
	Route::resource('product', 'ProductController', ['except' => ['show']]);
	Route::resource('sale', 'SaleController', ['except' => ['show']]);
	Route::resource('purchase', 'PurchaseController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

