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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* ADMIN */
Route::get('admin/dashboard', ['as' => 'get:admin:dashboard', 'uses' => 'AdminController@index']);
Route::get('admin/users', ['as' => 'get:admin:users', 'uses' => 'AdminController@getUsers']);
Route::get('admin/user/create', ['as' => 'get:admin:create:user', 'uses' => 'AdminController@getCreateUser']);
Route::post('admin/user/create', ['as' => 'post:admin:create:user', 'uses' => 'AdminController@postCreateUser']);
Route::get('admin/user/edit/{id}', ['as' => 'get:admin:edit:user', 'uses' => 'AdminController@getEditUser']);
Route::post('admin/user/edit/{id}', ['as' => 'post:admin:edit:user', 'uses' => 'AdminController@postEditUser']);
Route::get('admin/user/delete/{id}', ['as' => 'get:admin:delete:user', 'uses' => 'AdminController@getDeleteUser']);







