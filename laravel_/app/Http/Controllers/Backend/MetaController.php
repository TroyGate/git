<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 20:25
 */
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Meta;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class MetaController extends Controller
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

    /* meta管理页面 */
    public function meta($id)
    {
        $name = $id;
        if($id == 1){
            $name = 'meta_name';
        }else{
            $name = 'http_equiv';
        }
        return view('backend/meta', ['name' => $name]);
    }


    /* 添加操作 */
    public function meta_add()
    {
        $data = Request::all();
        /* 图片 处理 */
        $res = Db::table('meta')->insert($data);

        /*  判断是否添加成功!!! */
        if($res){
            return Redirect::to('meta_show')->send();
        }else{
            echo 2;die;
            return Redirect::to('meta_show')->send();
        }

    }

    /* meta管理 */
    public function meta_show()
    {
        $data = Db::table('meta')->get();
        return view('backend/meta_show', ['data' => $data]);
    }

    /* 删除 */
    public function meta_del($id)
    {
        $res = Db::table('meta')->where('id', $id)->delete();
        if($res){
            return Redirect::to('navbar_show')->send();
        }else{
            return Redirect::to('navbar')->send();
        }
    }

    /* 修改方法一 */
    public function meta_save($id)
    {
        /* 当前管理员名称 */
        $model = new Meta();
        $result = $model->save_add($id);

        if(!$result['http_equiv']){
            $name['id'] = 2;
            $name[] = $result['http_equiv'];
        }else{
            $name['id'] = 1;
            $name[] = $result['meta_name'];
        }
        return view('backend/meta_save', ['result' => $result, 'name' => $name]);

    }

    /* 修改方法二 */
       public function meta_saves()
       {
           $data = Request::all();

           $res = DB::table('meta')
               ->where('id', $data['id'])
               ->update($data);

           if($res){
               return Redirect::to('meta_show')->send();
           }else{
            return Redirect::to('meta_show')->send();
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