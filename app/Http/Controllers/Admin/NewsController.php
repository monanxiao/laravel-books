<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\NewsCategory;

/**
 * 资讯控制器
 *
 *
 */

class NewsController extends Controller
{
    /**
     * 文章列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::get();

        return view('admin.news.home', compact('news'));
    }

    /**
     * 新增文章
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 分类
        $newscategory = NewsCategory::get();

        return view('admin.news.add', compact('newscategory'));
    }

    /**
     * 接收文章数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
