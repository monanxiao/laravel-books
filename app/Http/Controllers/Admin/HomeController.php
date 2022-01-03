<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * 构造函数
     */
    public function __construct() {

        $this->middleware('auth');
    }


    /**
     * 后台首页
     *
     */
    public function index() {

        return view('admin.home');
    }
}
