<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Article;
use App\Http\Requests\Admin\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * 创建文章
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Chapter $chapter)
    {
        //
        return view('admin.books.article.add', compact('chapter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, Article $article)
    {

        /**
         * 过滤对应字段数据
         */
        $article->fill($request->all());
        $article->save();// 数据保存

        return redirect()->route('admin.chapter')->with('success', '章节增加成功！');
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
    public function edit(Article $article)
    {
        return view('admin.books.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //
        $article->update($request->all());
        return redirect()->route('admin.chapter')->with('success', '章节更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('danger', '删除成功！');
    }
}
