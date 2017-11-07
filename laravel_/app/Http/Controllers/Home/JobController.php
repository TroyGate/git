<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 10:45
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Pu;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

class JobController extends Controller
{
    /* 构造函数  */
    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();

        Pu::uv();                 /* 每日uv  统计 */
        Pu::pv();                 /* 每日pv  统计 */
        Pu::database_pu_v();      /* 每日 pv 统计 日志 */
        Pu::login_play();         /* 登录 互踢 */

        /*  判断是否登录  */
        $this->uid = Session::get('home_uid');
        if (!$this->uid) {
            return Redirect::to('home_login')->send();
        }

    }

    /* 公司注册信息添加 */
    public function job($id)
    {
        /*  公司详情  */
        $job = DB::table('job')->where('id', '=', $id)->get();
        $job_xq = Db::table('job_detail')->where('id', '=', $id)->get();

        return view('home/job_xq', ['job_xq'=>$job_xq, 'job'=> $job]);
    }

    /* 公司 入库操作 */
    public function job_add()
    {

    }

    /* 公司 展示 */
    public function job_show()
    {
        echo1;die;
        return view('backend/job_show');
    }


    /* 留言公司入库  */
    public function job_message($con, $id)
    {

        $uid = Session::get('home_uid');
        if($uid){
            return 0;
        }
        $ip = $_SERVER['REMOTE_ADDR'];

        if(Session::set($uid)){
            return 0;die;
        }

        Session::set($uid, $ip);
        $arr['create_time'] = time();
        $arr['job_id'] = $id;
        $arr['content'] = $con;
        $res = Db::table('message')->insert($arr);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }

    /*  产品中心 */
    public function product()
    {
        return view('home/product_list');
    }

}