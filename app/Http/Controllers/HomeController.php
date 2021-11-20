<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
	//文章首页
	public function index(){

		$data = Book::where('status', 1)->get();

		return view('books',compact('data'));
	}

	//详情
	public function show(Book $book){

		return view('detail',compact('book'));
	}

}
