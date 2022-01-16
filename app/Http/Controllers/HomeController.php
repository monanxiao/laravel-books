<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Banner;

class HomeController extends Controller
{
    /**
     * 首页
    */
    public function index(Book $books, Banner $banner) {

        $result = $books->get();
        $banners = $banner->get();

        return view('web.home', compact('result', 'banners'));
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
