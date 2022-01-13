<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin\BannersRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Str;

class bannersController extends Controller
{
    /**
     * 轮播图
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Banner $banner)
    {
        $banner = $banner->get();
        return view('admin.banners.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 创建轮播图片数据
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Banner $banner,BannersRequest $request)
    {
        //
        $banner->fill($request->all());

        /**
         * 检测是否上传图片
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
            $banner->src_img = $path;
        }

        $banner->save();

        return back()->with('success', '轮播图添加成功！');
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
    public function update(Banner $banner,BannersRequest $request)
    {

        $banner->fill($request->all());

        /**
         * 检测是否上传图片
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
            $banner->src_img = $path;
        }

        $banner->save();

        return back()->with('success', '轮播图更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return back()->with('success', '轮播图删除成功！');
    }
}
