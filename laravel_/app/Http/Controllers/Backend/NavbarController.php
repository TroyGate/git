<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 20:25
 */
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Navbar;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class NavbarController extends Controller
{

    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        /*  判断是否登录  */
        $user = Session::get('uid');
        if (!$user) {
            return Redirect::to('login')->send();
        }

    }
    /* 导航栏添加页面 */
    public function navbar()
    {
        $data = Db::table('navbar')->get();
        /* 无限极分类操作  */
        $res = $this->demo($data);
//        var_dump($res);die;
        return view('backend/navbar', ['data'=>$res]);
    }

    /* 添加操作 */
    public function navbar_add()
    {
        $data = Request::all();
        unset($data['navbar_img']);
        /* 图片 处理 */
        $file = Request::file('navbar_img');

        $destinationPath = 'img/'; //public 文件夹下面建 storage/uploads 文件夹
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);

        $data['navbar_img'] = $fileName;
        $res = Db::table('navbar')->insert($data);

        /*  判断是否添加成功!!! */
        if($res){
            return Redirect::to('navbar')->send();
        }else{
            return Redirect::to('navbar')->send();
        }

    }

    /* 导航栏管理展示 */
    public function navbar_show()
    {

        $data = Db::table('navbar')->get();
        foreach($data as $key=> &$val){
            if($val->pid != 0){
                $val->clide = '——';
            }
        }
        return view('backend/navbar_show', ['data' => $data]);
    }

    /* 删除 */
    public function classify_del($id)
    {
        $res = Db::table('navbar')->where('id', $id)->delete();
        if($res){
            return Redirect::to('navbar_show')->send();
        }else{
            return Redirect::to('navbar')->send();
        }
    }

    /* 修改方法一 */
    public function navbar_save($id)
    {

        $data = Db::table('navbar')->get();
        /* 无限极分类操作  */
        $res = $this->demo($data);

        /* 当前管理员名称 */
        $model = new Navbar();
        $result = $model->save_add($id);

        return view('backend/navbar_save', ['result' => $result, 'data'=>$res]);

    }

    /* 修改方法二 */
       public function navbar_saves()
       {
           $data = Request::all();
           // var_dump($data);die;
           $res = DB::table('navbar')
               ->where('id', $data['id'])
               ->update($data);

           if($res){
               return Redirect::to('navbar_show')->send();
           }else{
            return Redirect::to('navbar_show')->send();
           }

       }




    /*  无限极分类  */
    public function demo($arr, $pid =0, $xian='')
    {
        $res = array();
        foreach ($arr as $key => $val){
            if($val->pid == $pid) {
                if($pid != 0)
                    $val->xian = $xian . '—';
                $res[$val->id] = $val;

                $res[$val->id]->clide = $this->demo($arr, $val->id, '——');
            }
        }

        return $res;
    }



}