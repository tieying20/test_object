<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slideshow;
use App\Models\blogrolls;
use App\Models\sponsors;
use App\Models\Post_column;
use App\Models\User;
use App\Models\Userinfo;

class IndexController extends Controller
{
    // 前台首页
    public function index()
    {
    	// 轮播图模块
    	// 当前时间戳
    	$now = time();
    	$slide_list = Slideshow::where('start_at','<',$now)->where('stop_at','>',$now)->get();
    	$slide_num = count($slide_list);
    	// dump($slide_list);

        //赞助商模块
        $sponsor = sponsors::all();
        //友情链接模块
        $link = blogrolls::all();

        // 栏目
        $post_column = post_column::all();
        // //判断用户是否登录
        // dump($session = session());
        // //判断用户是否签到
        // dump($signin = session()->has('signin'));

        return view('Home/index',['slide_list'=>$slide_list,'slide_num'=>$slide_num,'sponsor'=>$sponsor,'link'=>$link,'post_column'=>$post_column]);

    }


}
