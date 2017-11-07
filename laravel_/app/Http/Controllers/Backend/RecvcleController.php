<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class RecvcleController extends Controller
{
    public $model;
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


    /*  回收站 页面  */
    public function recvcle_show()
    {

        $data = DB::table('admin')
            ->join('recycle_bin', 'admin.id', '=', 'recycle_bin.uid')
            ->join('classify', 'recycle_bin.shop_id', '=', 'classify.id')
            ->select('recycle_bin.*', 'classify.classify', 'admin.admin_name')
            ->get();
//    var_dump($data);die;
        return view('backend/recvcle_show', ['data'=>$data]);
    }


    /*  回收站 还原操作  */
    public function recvcle_restore($id, $shop_id)
    {

        $res = Db::table('recycle_bin')->where('id', '=', $id)->delete();
        if($res){
            $result = Db::table('classify')->where('id', '=', $shop_id)->update(['is_show'=>1]);
            if($result){
                return Redirect::to('classify_show')->send();
            }else{
                return Redirect::to('recvcle')->send();
            }
        }else{
            return Redirect::to('recvcle')->send();
        }
    }

        /* 删除 操作 */
    public function recvcle_del($id, $shop_id)
    {
        $res = Db::table('recycle_bin')->where('id', '=', $id)->delete();
        if($res){
            $result = Db::table('classify')->where('id', '=', $shop_id)->delete();
            if($result){
                return Redirect::to('recvcle')->send();
            }else{
                return Redirect::to('recvcle')->send();
            }
        }else{
            return Redirect::to('recvcle')->send();
        }
    }
}
