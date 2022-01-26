<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Support\Str;
use Log;

class UploadController extends Controller
{
    // 编辑器图片上传
    public function images(Request $request) {

        if(!empty($request->file('editormd-image-file'))) {
            $file = $request->file('editormd-image-file');// 文件

            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/edit/images/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('editormd-image-file')->storeAs(
                'public' . $folder_name, $filename
            );

            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;

            // 返回图片地址
            return response()->json([
                'success' => 1,
                'message' => '上传成功！',
                'url' => env('IMG_URL') . $path
            ]);

        }else{

            return response()->json([
                'success' => 0,
                'message' => '上传失败！',
            ]);
        }

    }
}
