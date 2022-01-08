<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * 首页
    */
    public function index(Book $books) {

        $result = $books->get();

        return view('web.home', compact('result'));
    }


	//文章首页
	public function books(){

		$data = Book::where('status', 1)->paginate(8);

		return view('books',compact('data'));
	}

	//详情
	public function show(Book $book){

		return view('detail',compact('book'));
	}

}
