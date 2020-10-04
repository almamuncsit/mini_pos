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


Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@authenticate')->name('login.confirm');


Route::group(['middleware' => 'auth'], function() {
	
	Route::get('/', 'DashboardController@index');
	Route::get('dashboard', 'DashboardController@index');

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');


	Route::get('groups','UserGroupsController@index')->name('groups');
	Route::get('groups/create','UserGroupsController@create');
	Route::post('groups','UserGroupsController@store');
	Route::delete('groups/{id}','UserGroupsController@destroy');


	Route::resource('users', 'UsersController' );
	
	Route::get('users/{id}/sales', 								'UserSalesController@index')->name('user.sales');

	Route::post('users/{id}/invoices', 							'UserSalesController@createInvoice')->name('user.sales.store');
	Route::get('users/{id}/invoices/{invoice_id}', 				'UserSalesController@invoice')->name('user.sales.invoice_details');
	Route::delete('users/{id}/invoices/{invoice_id}', 			'UserSalesController@destroy')->name('user.sales.destroy');
	Route::post('users/{id}/invoices/{invoice_id}', 			'UserSalesController@addItem')->name('user.sales.invoices.add_item');
	Route::delete('users/{id}/invoices/{invoice_id}/{item_id}', 'UserSalesController@destroyItem')->name('user.sales.invoices.delete_item');

	
	// Routes for purchase
	Route::get('users/{id}/purchases', 								'UserPurchasesController@index')->name('user.purchases');
	Route::post('users/{id}/purchases', 							'UserPurchasesController@createInvoice')->name('user.purchases.store');
	Route::get('users/{id}/purchases/{invoice_id}', 				'UserPurchasesController@invoice')->name('user.purchases.invoice_details');
	Route::delete('users/{id}/purchases/{invoice_id}', 				'UserPurchasesController@destroy')->name('user.purchases.destroy');
	Route::post('users/{id}/purchases/{invoice_id}', 				'UserPurchasesController@addItem')->name('user.purchases.add_item');
	Route::delete('users/{id}/purchases/{invoice_id}/{item_id}', 	'UserPurchasesController@destroyItem')->name('user.purchases.delete_item');


	
	Route::get('users/{id}/payments', 					'UserPaymentsController@index')->name('user.payments');
	Route::post('users/{id}/payments/{invoice_id?}', 	'UserPaymentsController@store')->name('user.payments.store');
	Route::delete('users/{id}/payments/{payment_id}', 	'UserPaymentsController@destroy')->name('user.payments.destroy');
	
	Route::get('users/{id}/receipts', 					'UserReceiptsController@index')->name('user.receipts');
	Route::post('users/{id}/receipts/{invoice_id?}', 	'UserReceiptsController@store')->name('user.receipts.store');
	Route::delete('users/{id}/receipts/{receipt_id}', 	'UserReceiptsController@destroy')->name('user.receipts.destroy');

	Route::get('users/{id}/reports', 					'UserReportsController@reports')->name('user.reports');


	Route::resource('categories', 	'CategoriesController', ['except' => ['show'] ] );
	
	Route::resource('products', 	'ProductsController' );
	Route::get('stocks', 			'ProductsStockController@index')->name('stocks');
	
	Route::get('reposts/sales', 		'Reports\SaleReportController@index')->name('reports.sales');
	Route::get('reposts/purchases', 	'Reports\PurchaseReportController@index')->name('reports.purchases');

	Route::get('reposts/payments', 	'Reports\PaymentReportController@index')->name('reports.payments');
	Route::get('reposts/receipts', 	'Reports\ReceiptReportController@index')->name('reports.receipts');
	
	Route::get('reposts/days', 	'Reports\DayReportsController@index')->name('reports.days');

});



