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

Route::get('groups','UserGroupsController@index')->name('groups');
Route::get('groups/create','UserGroupsController@create');
Route::post('groups','UserGroupsController@store');
Route::delete('groups/{id}','UserGroupsController@destroy');


Route::resource('users', 'UsersController', ['except' => ['show'] ]);

// Route::resource('users', 'UsersController', ['only' => ['show', 'destroy'] ]);
// Route::get('users', 'UsersController@index');
// Route::get('users/{id}', 'UsersController@show');
// Route::get('users/create', 'UsersController@create');
// Route::post('users', 'UsersController@store');
// Route::get('users/{id}/edit', 'UsersController@edit');
// Route::put('users/{id}', 'UsersController@update');
// Route::delete('users/{id}', 'UsersController@destroy');





