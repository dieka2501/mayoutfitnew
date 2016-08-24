<?php

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


Route::group(['prefix'=>'admin'],function(){
	Route::get('/', 'loginController@index');
	Route::post('/login', 'loginController@store');	
	Route::get('/logout', 'logoutController@index');

	//DASHBOARD
	Route::get('/dashboard', 'dashboardController@index');

	//Categories
	Route::get('/categories', 'categoryController@index');	
	Route::get('/categories/add', 'categoryController@create');	
	Route::post('/categories/add', 'categoryController@store');
	Route::get('/categories/edit/{id}', 'categoryController@edit');	
	Route::post('/categories/edit', 'categoryController@update');	
	Route::get('/categories/delete/{id}', 'categoryController@destroy');	

	//Product
	Route::get('/product', 'productController@index');	
	Route::get('/product/add', 'productController@create');	
	Route::post('/product/add', 'productController@store');
	Route::get('/product/edit/{id}', 'productController@edit');	
	Route::post('/product/edit', 'productController@update');	
	Route::get('/product/delete/{id}', 'productController@destroy');

	//Order
	Route::get('/order', 'orderController@index');	
	Route::get('/order/add', 'orderController@create');	
	Route::post('/order/add', 'orderController@store');
	Route::get('/order/edit/{id}', 'orderController@edit');	
	Route::post('/order/edit', 'orderController@update');	
	Route::get('/order/delete/{id}', 'orderController@destroy');		
	Route::get('/order/print/{id}', 'orderController@print_out');
	Route::get('/order/konfirm/bayar/{id}', 'orderController@konfirm_bayar');	
	Route::post('/order/konfirm/bayar', 'orderController@do_payment');	

	//Report Order
	Route::get('/report/order', 'reportOrderController@index');	
	Route::get('/report/order/print', 'reportOrderController@create');	
});

Route::group(['prefix'=>'api'],function(){
	Route::post('/kota/getidprovinsi','apiController@get_kota_idprovinsi');
	Route::post('/kecamatan/getidprovinsiidkota','apiController@get_kecamatan_idprovinsi_idkota');
	Route::post('/ongkir','apiController@get_ongkir');
	Route::get('/product/autocomplete','apiController@get_product_auto');
	Route::post('/product/idproduct','apiController@get_product_byid');
});
