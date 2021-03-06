<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticesController extends Controller
{
    /**
     * 公告首页
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 取出公告数据
        $notices = Notice::get();

        return view('web.notices.home', compact('notices'));
    }

    /**
     * 公告详情
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('web.notices.show', compact('notice'));
    }

}
