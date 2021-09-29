<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
	//文章首页
	public function index(){

		$data = Book::get();

		return view('home',compact('data'));
	}

	//详情
	public function show(Book $book){

		return view('detail',compact('book'));
	}

}
