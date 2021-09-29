<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    //书籍管理
    $router->resource('books',BookController::class);

    //章节管理
    $router->resource('chapter',ChapterController::class);

    //文章管理
    $router->resource('article',ArticleController::class);
});
