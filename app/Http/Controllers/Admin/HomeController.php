<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Visitors;
use DB;

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

        /**
         * 访客统计
         *
         */
        $visits = Visitors::whereDate('created_at', '>', date('Y-m-d', strtotime('-7 day')))
                            ->whereDate('created_at', '<',date('Y-m-d'))
                            ->count();


        /**
         * 书籍统计
         *
         */
        $BooksVisits = Visitors::whereDate('created_at', '>', date('Y-m-d', strtotime('-7 day')))
                            ->whereDate('created_at', '<',date('Y-m-d'))
                            ->where('type', '!=', 'home')
                            ->count();

        /**
          * 网站已用空间
          */
        $disktotal = disk_total_space('/'); // 磁盘总空间
        $diskfree = disk_free_space('/');// 剩余空间
        $used = $disktotal - $diskfree;// 总空间 - 剩余空间 = 已用空间
        $diskusedize = round($used / 1048576, 2) . 'MB';// 已用总空间转换 MB

        /**
         * 数据库已使用空间
         */

        $DatabaseSize = '0';

        return view('admin.home', compact('diskusedize', 'DatabaseSize', 'visits', 'BooksVisits'));
    }
}
