<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/10/31
 * Time: 18:43
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Classify;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class PressController extends Controller
{

    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        /*  判断是否登录  */
        $user = Session::get('uid');
        if(!$user){
            return Redirect::to('login')->send();
        }

    }

    /* 新闻添加页面  */
    public function press(){
        return view('backend/press');
    }


    /* 新闻添加方法 */
    public function press_add()
    {

        $data = Request::all();

        $data['press_time'] = date('Y-m-d H:i:s');
        $res = Db::table('press')->insertGetId($data);
        if($res){
            return Redirect::to('press')->send();
        }else{
            return Redirect::to('press')->send();
        }
    }

    /*  新闻展示   */
    public function press_show()
    {
        $time = date("Y-m-d H:i:s", strtotime("-1 week"));
        /*  根据时间查询 数据 */
        $data = Db::table('press')->where('press_time', '>' ,$time)->paginate(3);
//        var_dump($data);die;
        return view('backend/press_show', ['data' => $data]);
    }

    /* 删除 */
    public function classify_del($id)
    {
        $res = Db::table('press')->where('id', $id)->delete();
        if($res){
            return Redirect::to('press_show')->send();
        }else{
            return Redirect::to('press')->send();
        }
    }


}