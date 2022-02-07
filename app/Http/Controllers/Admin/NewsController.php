<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\NewsCategory;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Str;

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
    public function store(NewsRequest $request, News $news)
    {
        // 数据过滤
        $news->fill($request->all());

        /**
         * 检测是否上传图片
         */
        if(!empty($request->uploadImage)) {

            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/news/images/thumb/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            // 保存封面图
            $news->thumb = $path;

        }else{

            // 封面默认图
            $news->thumb = cache('logo_img');
        }

        // 保存数据
        $news->save();

        return redirect()->route('admin.news.index')->with('success', '文章发布成功！');
    }

    /**
     * 编辑
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $newscategory = NewsCategory::get();

        return view('admin.news.edit', compact('news', 'newscategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        // 数据过滤
        $news->fill($request->all());

        /**
         * 检测是否上传图片
         */
        if(!empty($request->uploadImage)) {

            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/news/images/thumb/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            // 保存封面图
            $news->thumb = $path;

        }else{

            // 封面默认图
            $news->thumb = cache('logo_img');
        }

        // 保存数据
        $news->save();

        return redirect()->route('admin.news.index')->with('success', '文章更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // 删除数据
        $news->delete();

        return back()->with('warning', '文章删除成功！');
    }
}
