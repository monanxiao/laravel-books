<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * 后台登录
     *
    */
    public function index() {

        return view('admin.users.login');
    }

    /**
     * 编辑用户
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * 更新数据
     */
    public function update(User $user, UsersRequest $request)
    {
        /**
         * 获取提交字段
         */
        $user->fill($request->all());

        /**
         * 验证密码是否修改
         */
        if(!empty($request->old_password))
        {
            if(Auth::attempt(['email' => $user->email, 'password' => $request->old_password]))
            {
                $user->password = bcrypt($request->new_password);// 新密码

            }else{
                return back()->with('success', '旧密码错误，修改失败！');
            }
        }

        /**
         * 验证头像是否为空
         */
        if(!empty($request->uploadImage)) {
            $file = $request->file('uploadImage');// 文件
            $extension = $file->getClientOriginalExtension();// 文件后缀
            $folder_name = "/uploads/avatar/" . date("Ym/d", time());// 文件路径
            // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
            $filename = 'cover_' . time() . '_' . Str::random(10) . '.' . $extension;
            // 图片上传
            $request->file('uploadImage')->storeAs(
                'public' . $folder_name, $filename
            );
            // 文件路径
            $path = 'storage' . $folder_name . '/' . $filename;
            // 保存头像
            $user->avatar = $path;
        }

        $user->save();

        return back()->with('success', '修改成功！');

    }

    /**
     * 接收登录参数
     * UsersRequest 验证规则
     *
     */
    public function store(UsersRequest $request) {

        /**
         * 接收登陆参数
         *
         */
        $user = $request->only(['email' , 'password']);

        /**
         * 验证用户
         * 参数 用户实例，记住我
         */
        if(Auth::attempt($user, $request->has('remember'))) {

            // 通过验证
            session()->flash('success', '欢迎回来！');

            return redirect('admin');

        }else{

            // 验证失败
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }


    }

    /**
     * 用户退出
     */
    public function destroy() {

        Auth::logout(); // 退出当前用户
        session()->flash('warning', '您已退出！');

        return redirect()->route('admin.login');
    }
}
