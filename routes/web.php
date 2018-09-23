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

Route::get('/', 'UserController@index');
Route::get('/user/detail/{id}', 'UserController@show')->name('detail');
Route::get('/user/edit/{id}', 'UserController@edit')->name('edit');
Route::post('/user/edit/{id}', 'UserController@update')->name('update');
Route::get('/user/new', 'UserController@create')->name('new');
Route::post('/user/new', 'UserController@store')->name('store');
