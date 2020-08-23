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

Route::get('groups','UserGroupsController@index');
Route::get('groups/create','UserGroupsController@create');
Route::post('groups','UserGroupsController@store');
Route::delete('groups/{id}','UserGroupsController@destroy');

Route::get('users', 'UsersController@index');

