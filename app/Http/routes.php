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
	Route::get('/order/konfirm/kirim/{id}', 'orderController@konfirm_kirim');		
	Route::post('/order/konfirm/kirim', 'shipmentController@add_shipment');		

	//Report Order
	Route::get('/report/order', 'reportOrderController@index');	
	Route::get('/report/order/print', 'reportOrderController@create');	

	//Galery
	Route::get('/galeries', 'galeryController@index');	
	Route::get('/galeries/add', 'galeryController@create');	
	Route::post('/galeries/add', 'galeryController@store');
	Route::get('/galeries/edit/{id}', 'galeryController@edit');	
	Route::post('/galeries/edit', 'galeryController@update');	
	Route::get('/galeries/delete/{id}', 'galeryController@destroy');

	//Categories
	Route::get('/user', 'usersController@index');	
	Route::get('/user/add', 'usersController@create');	
	Route::post('/user/add', 'usersController@store');
	Route::get('/user/edit/{id}', 'usersController@edit');	
	Route::post('/user/edit', 'usersController@update');	
	Route::get('/user/delete/{id}', 'usersController@destroy');

	//Voucher
	Route::get('/voucher', 'voucherController@index');	
	Route::get('/voucher/add', 'voucherController@create');	
	Route::post('/voucher/add', 'voucherController@store');
	Route::get('/voucher/edit/{id}', 'voucherController@edit');	
	Route::post('/voucher/edit', 'voucherController@update');	
	Route::get('/voucher/delete/{id}', 'voucherController@destroy');

	//Member Type
	Route::get('/membertype', 'membertypeController@index');	
	Route::get('/membertype/add', 'membertypeController@create');	
	Route::post('/membertype/add', 'membertypeController@store');
	Route::get('/membertype/edit/{id}', 'membertypeController@edit');	
	Route::post('/membertype/edit', 'membertypeController@update');	
	Route::get('/membertype/delete/{id}', 'membertypeController@destroy');
});

Route::group(['prefix'=>'api'],function(){
	Route::post('/kota/getidprovinsi','apiController@get_kota_idprovinsi');
	Route::post('/kecamatan/getidprovinsiidkota','apiController@get_kecamatan_idprovinsi_idkota');
	Route::post('/ongkir','apiController@get_ongkir');
	Route::get('/product/autocomplete','apiController@get_product_auto');
	Route::post('/product/idproduct','apiController@get_product_byid');
	Route::post('/order/code','apiController@get_idoroder');
	Route::post('/sicepat/orderid','sicepatController@sicepat_get_waybill');
	Route::post('/sicepat/orderid','sicepatController@sicepat_get_resi');
});

Route::get('/','homeController@index');
Route::get('/new','newReleaseController@index');
Route::get('/product/detail/{id}','newReleaseController@detail');
Route::get('/product/category/{id}','productCategoryController@index');
Route::get('/cart/add/{id}','cartController@store');
Route::get('/cart','cartController@index');
Route::get('/cart/destroy','cartController@destroy');
Route::post('/cart/update','cartController@update');
Route::get('/checkout','checkoutController@index');
Route::post('/checkout','checkoutController@store');
Route::get('/login','loginFrontController@index');
Route::get('/mail/cek','checkoutController@create');
Route::post('/payment/do','paymentController@store');
Route::get('/payment','paymentController@index');
Route::get('/cart/hapus/{id}','cartController@delete_single');
Route::get('/checkout/mail','checkoutController@mail');
Route::get('/galery/category/{id}','galeryCategoryController@index');

