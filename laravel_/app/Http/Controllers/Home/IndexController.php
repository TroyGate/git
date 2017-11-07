<?php 
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Pu;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Session,Redirect;

class IndexController extends Controller 
{
    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        Pu::uv();                 /* 每日uv  统计 */
        Pu::pv();                 /* 每日pv  统计 */
        Pu::database_pu_v();      /* 每日 pv 统计 日志 */
        Pu::login_play();         /* 登录 互踢 */

        $this->uid = Session::get('home_uid');
        if (!$this->uid) {
            return Redirect::to('home_login')->send();
        }

    }


	/* 前台首页 */
	public function index($locale = 'zh-cn')
	{
        /* 设置 网页编码 */
        App::setLocale($locale);

        $job = DB::table('job')->get();
        $press = Db::table('press')->get();   /*  新闻动态  */

		return view('home/index', ['job'=>$job,  'press'=> $press]);
	}


    /* 简介 */
    public function shop()
    {
        return view('home/shop_list');
    }


    /* 新闻 */
    public function new_list()
    {
        $press = Db::table('press')->get();   /*  新闻动态  */
        return view('home/new_list', ['press'=>$press]);
    }



}