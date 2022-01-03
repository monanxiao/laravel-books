<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * 章节管理
     */

    public function index() {
        return view('admin.books.chapter.home');
    }
}
