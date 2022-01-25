<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Http\Resources\ChapterResource;
use App\Jobs\Web\BooksChapterLook;

class ChaptersContrller extends Controller
{
    /**
     * 章节列表
     */
    public function index(Request $request, Chapter $chapter)
    {

        /**
         * 加入队列记录 5秒后执行记录访问书籍章节
         */
        $result = ['chapter' => $chapter , 'server' => $request->server()];

        BooksChapterLook::dispatch($result)
                    ->delay(now()->now()->addSeconds(5))
                    ->onQueue('bookChapterook');

        $query = $chapter->query();

        if($bookId = $request->book_id)
        {
            $query->where('book_id', $bookId);
        }

        $chapters = $query->with('article')->orderBy('id','asc')->paginate();

        $chapters['books'] = Book::find($bookId);

        return ChapterResource::collection($chapters);
    }
}
