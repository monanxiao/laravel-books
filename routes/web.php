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


/**
 * 后台管理路由
 *
*/


Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function() {

    /**
     * 后台首页
     *
    */
    Route::get('/', 'HomeController@index')->name('home');

    /**
     * 后台登录
     * 用户身份验证相关的路由
     */
    // Route::namespace('Admin')->resource('login', 'UsersController')->name('login');
    Route::get('login', 'UsersController@index')->name('login');
    Route::post('login', 'UsersController@store');
    Route::delete('logout', 'UsersController@destroy')->name('logout');

    /**
     * 消息
     */
    Route::resource('messages', 'MessagesController');

    /**
     * 书籍
     */
    Route::get('books', 'BooksController@index')->name('books');
    Route::post('books', 'BooksController@store');
    Route::patch('books/{book}', 'BooksController@update')->name('books.update');
    /**
     * 书籍 状态切换
     */
    Route::get('books/{book}/{status}', 'BooksController@status_update')->name('books.status');

    /**
     * 章节
     */
    Route::get('chapter', 'ChaptersController@index')->name('chapter');

    /**
     * 公告
     *
     */
    Route::resource('notices', 'NoticesController');

    /**
     * 日志
     *
     */
    Route::resource('logs', 'LogsController');

    /**
     * 来访记录
     *
     */
    Route::resource('visitors', 'VisitorsController');

    /**
     * 系统设置
     *
     */
    Route::resource('system', 'SystemController');

});

