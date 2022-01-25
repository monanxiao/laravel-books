<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Jobs\Web\BooksLook;

class BooksController extends Controller
{
    /**
     * 书籍详情
     */
    public function show(Book $book , Request $request) {

        /**
         * 加入队列记录 5秒后执行记录访问书籍
         */
        $result = ['book' => $book , 'server' => $request->server()];

        BooksLook::dispatch($result)
                    ->delay(now()->now()->addSeconds(5))
                    ->onQueue('bookLook');


        return view('web.books.show', compact('book'));
    }
}
