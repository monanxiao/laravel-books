<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Http\Resources\ChapterResource;

class ChaptersContrller extends Controller
{
    /**
     * 章节列表
     */
    public function index(Request $request, Chapter $chapter)
    {

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
