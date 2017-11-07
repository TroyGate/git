<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 11:15
 */

namespace App\Http\Controllers\Home;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

class Pu extends Controller
{

    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
    }

    /* pv  统计 */
    public static function pv()
    {
        $data = Session::get('pv');
        if(empty($data)){
            // echo 1;die;
            $pv = 1;
        }else{
            // echo 2;die;
            $pv = $data+1;
        }
        Session::set('pv', $pv);
    }


    /*   超级简单 uv 统计  */
    public static function uv()
    {
        $ip = $_SERVER['REMOTE_ADDR'];  /* 获取用户端的 ip */
        $uv = Session::get('uv');
        if(empty($uv)){                 /* 如果为空则 直接添加uv */
            $data[] = $ip;
            Session::set('uv', $data);
        }else{                          /* 否则 判断 这个ip是否 访问过 */
            if(in_array($ip, $uv)){ 

            }else{
                $uv[] = $ip;
                Session::set('uv' ,$uv);
            }
        }

    }


    /* pv uv 统计 添加入库 */
    public static function database_pu_v()
    {
        $uv = Session::get('uv');  /* uv */
        // echo Session::get('pv');;die;
        $p_u_v['pv'] = Session::get('pv');  /* pv */
        $p_u_v['uv'] = count($uv);
        $p_u_v['ip'] = $uv;

        /* 将访问量写入 log 日志 */
        file_put_contents('/laravel_log.log',var_export($p_u_v,true));
    }
    

    /* 登录互踢 功能  */
    public static function login_play(){
        $time = Session::get('time');
        if($time){
            $home_uid = Session::get('home_uid');
            $user_time = Db::table('activity_user')->where('uid', '=', $home_uid)->get();
                
            if($user_time){

                if($user_time[0]->login_time != $time){
                    Session::forget('home_uid');
                    Session::forget('time');           /* 删除上次登录时间 */
                    return Redirect::to('home_login')->send();  /* 首页 */
                }
                
            }else{
                return Redirect::to('home_login')->send();  /* 首页 */
            }
        }
    }


}