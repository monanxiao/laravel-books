<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\Admin\BooksRequest;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Str;

class BooksController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * 书籍列表
     */
    public function index(Book $book) {

        $books = $book->withCount('chapter')->get();

        return view('admin.books.home', compact('books'));
    }

    /**
     * 更新书籍状态
     */
    public function status_update(Book $book, $status) {

        $book->update([ 'status' => $status ]);
        session()->flash('success', '修改成功！');
        return back();
    }

    /**
     * 创建书籍
     * 接收数据
     *
     */
    public function store(BooksRequest $request, Book $books) {

        /**
         * 创建书籍数据
         */
        $books->fill($request->all());
        $books->cover_src = 'images/books_bg.jpg';

        /**
         * 检测是否上传封面
         */
        if(!empty($request->uploadImage)) {
            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/books/images/cover/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            // 保存封面图
            $books->cover_src = $path;
        }

        // 保存数据
        $books->save();

        session()->flash('success', '创建成功！');

        return back();
    }

    /**
     * 更新书籍
     */
    public function update(BooksRequest $request, Book $book) {

        /**
         * 接收更新数据
         *
         */
        $book->fill($request->all());

         /**
         * 检测是否上传封面
         */
        if(!empty($request->uploadImage)) {
            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/books/images/cover/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            // 保存封面图
            $book->cover_src = $path;
        }

        // 保存数据
        $book->save();

        session()->flash('success', '更新成功！');

        return back();
    }
}
