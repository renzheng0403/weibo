<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 该控制器负责整个网站静态页面的处理
 */
class StaticPagesController extends Controller
{
    public function home()
    {
        return view('static_pages/home');
    }

    public function help()
    {
        return view('static_pages/help');
    }

    public function about()
    {
        return view('static_pages/about');
    }
}
