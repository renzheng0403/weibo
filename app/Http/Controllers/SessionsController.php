<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

/**
 * 处理用户登录退出相关操作
 * create：显示登录页面
 * store：创建新会话
 * destroy：销毁会话
 */
class SessionsController extends Controller
{
    /**
     * 处理 login get 请求，即当用户请求登录时，返回登录界面
     * @return var
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 处理 login post 请求，即当用户提交登录信息时，验证用户权限
     * @param Request $request
     * @return var
     */
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }

        return;
    }

    public function destroy()
    {}
}
