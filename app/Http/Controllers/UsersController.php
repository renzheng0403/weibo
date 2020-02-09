<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        /**
         * 使用 validate 方法进行数据验证，接收两个参数
         * 第一个参数：用户输入的数据
         * 第二个参数：该输入数据的验证规则
         */
        /**
         * require：存在性验证，验证是否为空
         * min 和 max：长度验证，限制最小长度和最大长度
         * email：格式验证，邮箱格式
         * unique：唯一性验证
         */
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session()->flash('success', '欢迎，您将在这里开启一段新的旅程～');
        return redirect()->route('users.show', [$user]);
    }
}
