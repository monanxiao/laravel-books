<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
