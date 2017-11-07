<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 10:45
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use Session,Redirect,Request;

class JobController extends Controller
{
    /* 构造函数  */
    public function __construct()
    {

        parent::__construct();
    }

    /* 公司注册信息添加 */
    public function jobs()
    {
//        echo 1;die;
        return view('backend/job');
    }


    /* 公司 入库操作 */
    public function job_add()
    {

        $file = Request::file('myfile');
        $destinationPath = 'img/'; //public 文件夹下
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $filePath = asset($destinationPath.$fileName);

        $data = Request::all();
        unset($data['myfile']);
        $data['img'] = $fileName;
        $arr['content'] = $data['content'];
        unset($data['content']);
        $rse = Db::table('job')->insertGetId($data);
        $arr['id'] = $rse;
        $result = Db::table('job_detail')->insert($arr);
        if($result){
            return Redirect::to('job')->send();
        }
    }


    /* 公司 展示 */
    public function job_show()
    {
        $data = Db::table('job')->get();
        return view('backend/job_show', ['data' => $data]);
    }


    /* 修改方法一 */
    public function job_save($id)
    {
        /* 当前管理员名称 */
        $model = new Job();
        $result = $model->save_add($id);
        return view('backend/job_save', ['result' => $result]);

    }

    /* 修改方法二 */
       public function job_saves()
       {
           $data = Request::all();
           // var_dump($data);die; 
           $res = DB::table('job')
               ->where('id', $data['id'])
               ->update($data);

           if($res){
               return Redirect::to('navbar_show')->send();
           }else{
            return Redirect::to('navbar_show')->send();
           }

       }




    /* 删除 */
    public function job_del($id)
    {
        $res = Db::table('job')->where('id', $id)->delete();
        if($res){
            return Redirect::to('job_show')->send();
        }else{
            return Redirect::to('job')->send();
        }
    }



}