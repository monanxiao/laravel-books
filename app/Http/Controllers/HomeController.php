<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Banner;
use App\Jobs\Web\VisitorJob;


class HomeController extends Controller
{
    /**
     * 首页
    */
    public function index(Book $books, Banner $banner, Request $request) {

        /**
         * 加入队列记录 5秒后执行记录客户来源
         */
        $visit = $request->server();
        VisitorJob::dispatch($visit)
                    ->delay(now()->now()->addSeconds(5))
                    ->onQueue('processing');;

        $result = $books->where('status', 1)->get();
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
