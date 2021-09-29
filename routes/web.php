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


//文章首页
Route::get('/','HomeController@index');

//edit 编辑
Route::get('edit','HomeController@create');

//详情
Route::get('show/{book}','HomeController@show')->name('show');

//接收数据
Route::post('create','HomeController@store')->name('create');