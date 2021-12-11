<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\BooksResource;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * 书籍资源列表
     * 返回数据 result
     */
    public function index()
    {
        return BooksResource::collection(Book::all());
    }

    /**
     * 书籍详情
     */
    public function show(Book $book)
    {
        $books = $book->with('chapter')->paginate();

        return BooksResource::collection($books);
    }
}
