<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 11:15
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Home\Pu;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

class ContactController extends Controller
{
    public $uid ;
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


    /* 前台用户信息的展示 */
    public function contact_show()
    {
//        echo $this->uid;die;
        $data = Db::table('user')->where('id', $this->uid)->get();
//        var_dump($data);die;
        return view('home/contact', ['data'=>$data]);
    }


    /* 用户密码的修改 */
    public function save()
    {

    }



}