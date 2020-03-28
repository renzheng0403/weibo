<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

/**
 * 该控制器负责整个网站静态页面的处理
 */
class StaticPagesController extends Controller
{
    public function home()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('static_pages/home', compact('feed_items'));
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
