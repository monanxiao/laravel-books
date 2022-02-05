<?php

use Illuminate\Http\Request;
use App\Models\Article;
use App\Jobs\Web\BooksChapterLook;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::prefix('v1')->name('api.v1.')->namespace('Api')->group(function() {

    /**
     * 书籍接口
     * index 列表
     * show 详情
     */
    Route::resource('books', 'BooksController')->only([
        'index', 'show'
    ]);

    /**
     * 获取章节
     *
     */
    Route::resource('chapters', 'ChaptersContrller')->only([
        'index', 'show'
    ]);

    /**
     * 编辑器图片上传
     */
    Route::post('upload', 'UploadController@images');

    /**
     * 百度网盘回调地址
     *
     */
    Route::get('bddisk', 'UploadController@bddisk');

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('article/{article}',function(Article $article, Request $request){

    /**
     * 加入队列记录 5秒后执行记录访问书籍章节
     */
    $result = ['article' => $article , 'server' => $request->server()];

    BooksChapterLook::dispatch($result)
                ->delay(now()->now()->addSeconds(5))
                ->onQueue('bookChapterook');

	return $article->content;

})->name('api.v1.article.show');
