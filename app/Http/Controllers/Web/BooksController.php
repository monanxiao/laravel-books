<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    /**
     * 书记详情
     */
    public function show(Book $book) {

        return view('web.books.show', compact('book'));
    }
}
