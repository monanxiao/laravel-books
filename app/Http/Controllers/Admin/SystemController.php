<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Str;

class SystemController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * 网站设置
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Cache::store('database')->put('bar', 'baz', 600); // 10 分钟

        // $value = Cache::store('database')->get('bar');
        // dd($value);

        return view('admin.systems.home');
    }

    /**
     * 网站信息更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        Cache::put('web_name', $request->web_name);
        Cache::put('email', $request->email);
        Cache::put('qq', $request->qq);
        Cache::put('beian', $request->beian);
        Cache::put('copyright', $request->copyright);

        // 判断图片是否存在
        if(!empty($request->uploadImage)) {
            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/books/images/logo/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'logo_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            Cache::put('logo_img', url($path));
        }

        return back()->with('success', '修改成功！');
    }

}
