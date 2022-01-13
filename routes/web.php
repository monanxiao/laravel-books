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


// 书店首页
Route::get('/','HomeController@index');


Route::prefix('web')->namespace('Web')->name('web.')->group(function() {

    /**
     * 书籍详情
    */
    Route::resource('books', BooksController::class)->only(['show']);

    /**
     * 章节详情
     */
    Route::resource('article', ArticleController::class)->only(['show']);

    /**
     * 公告通知
     *
     */
    Route::resource('notices', NoticesController::class);

    /**
     * 帮助中心
     */
    Route::resource('help', HelpController::class);

    /**
     * 留言
     *
     */
    Route::resource('messages', MessagesController::class);

});


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
     * 接收章节数据
     */
    Route::post('chapter', 'ChaptersController@store');
    /**
     * 更新章节数据
     */
    Route::patch('chapter/{chapter}', 'ChaptersController@update')->name('chapter.update');
    /**
     * 章节状态切换
     */
    Route::get('chapter/{chapter}/{status}', 'ChaptersController@status_update')->name('chapter.status');

    /**
     * 文章创建
     */
    Route::get('article/create/{chapter}', 'ArticleController@create')->name('article.create');

    /**
     * 接收文章数据
     */
    Route::post('article', 'ArticleController@store')->name('article.store');

    /**
     * 编辑文章
     *
     */
    Route::get('article/{article}/edit', 'ArticleController@edit')->name('article.edit');
    /**
     * 更新文章数据
     */
    Route::patch('article/{article}', 'ArticleController@update')->name('article.update');

    /**
     * 删除文章数据
     */
    Route::delete('article/{article}', 'ArticleController@destroy')->name('article.destroy');

    /**
     * 公告
     *
     */
    Route::resource('notices', NoticesController::class);

    /**
     * 轮播图
     */
    Route::resource('banner', BannersController::class);

    /**
     * 日志
     *
     */
    Route::resource('logs', 'LogsController');

    /**
     * 来访记录
     *
     */
    Route::resource('visitors', VisitorsController::class)
        ->only(['index']);

    /**
     * 系统设置
     *
     */
    Route::resource('system', 'SystemController');

});

