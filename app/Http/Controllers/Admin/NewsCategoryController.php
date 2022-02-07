<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\NewsCategory;
use App\Http\Requests\Admin\NewsCategoryRequest;

/**
 * 栏目分类控制器
 *
 */

class NewsCategoryController extends Controller
{
    /**
     * 栏目列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $newscategory = NewsCategory::get();

        return view('admin.newscategory.home', compact('newscategory'));
    }


    /**
     * 接收新增栏目分类数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCategoryRequest $request, NewsCategory $newscategory)
    {
        // 获取提交数据
        $newscategory->fill($request->all());
        // 数据入库
        $newscategory->save();

        return back()->with('success', '栏目添加成功！');
    }


    /**
     * 更新栏目数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsCategoryRequest $request, NewsCategory $newscategory)
    {
        // 获取提交数据
        $newscategory->fill($request->all());
        // 数据入库
        $newscategory->save();

        return back()->with('success', '栏目更新成功！');
    }

    /**
     * 删除栏目
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsCategory $newscategory)
    {
        $newscategory->delete();// 删除当前数据

        return back()->with('warning', '栏目删除成功！');
    }
}
