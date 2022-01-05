<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use App\Http\Requests\admin\ChapterRequest;

class ChaptersController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * 章节管理
     */
    public function index(Chapter $chapters) {

        // 取出章节数据
        $result = $chapters->with(['books', 'article'])->get();
        $books = Book::where('status', '1')->get();

        return view('admin.books.chapter.home', compact('result', 'books'));
    }

    /**
     * 接收章节数据
     *
     */
    public function store(ChapterRequest $request, Chapter $chapters) {

        /**
         * 获取章节数据
         *
         */
        $chapters->fill($request->all());
        $chapters->save();

        return back()->with('success', '章节创建成功！');
    }

    /**
     * 更新数据
     */
    public function update(ChapterRequest $request, Chapter $chapter) {

        /**
         * 获取章节数据
         *
         */
        $chapter->fill($request->all());
        $chapter->save();

        return back()->with('success', '章节更新成功！');
    }

    /**
     * 更新章节状态
     *
     */

    public function status_update(Chapter $chapter) {

        $chapter->status = !$chapter->status;
        $chapter->save();
        return back()->with('success', '章节状态切换成功！');
    }
}
