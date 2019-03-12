<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 前台首页
    public function index()
    {
        return view('Home/index/index');
    }

    // 登录页面
    public function login()
    {
        return view('Home/index/login');
    }

    // 注册页面
    public function register()
    {
        return view('Home/index/register');
    }
}
