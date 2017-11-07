<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class AdminController extends Controller
{
    public $model;
    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        $this->model = new Admin();

        /*  判断是否登录  */
        $user = Session::get('uid');
        if(!$user){
            return Redirect::to('login')->send();
        }

    }


    /*  管理员 添加页面  */
    public function admin()
    {
        $data = Db::table('role')->get();
//        var_dump($data);die;
        return view('backend/admin', ['data'=>$data]);
    }


    /* 管理员 添加 */
    public function admin_add()
    {
        $data = Request::all();
        $str = implode(',', $data['role_id']);
        unset($data['role_id']);
        /*  如果有数据则添加数据库 */
        if(isset($data)){
            $data['create_time'] = time();
            $res = DB::table('admin')->insertGetId($data);
            $arr['admin_id'] = $res;
            $arr['role_id'] = $str;
            $res = DB::table('admin_role')->insertGetId($arr);

            if($res) {     /* 判断是否 添加成功 */
                return Redirect::to('admin')->send();
            }else{
                return Redirect::to('admin')->send();
            }
        }else{
            return Redirect::to('admin')->send();
        }

    }


    /*  管理员 展示 */
    public function admin_show(){
        $users = DB::table('admin_role')
            ->join('admin', 'admin_role.admin_id', '=', 'admin.id')
            ->join('role', 'admin_role.role_id', '=', 'role.id')
            ->select('admin.*', 'admin_role.*', 'role.role_name')
            ->paginate(2);

            // $data = $this->model->user_data();
            // var_dump($data);die;

        return view('backend/admin_show', ['data' => $users]);
    }



    /* 管理员 删除操作 */
    public function admin_delete($id)
    {

        $res = Db::table('admin')->where('id', $id)->delete();
        if($res){
            return Redirect::to('admin')->send();
        }else{
            return Redirect::to('admin_show')->send();
        }
    }

    /* 修改方法一 */
    public function admin_save($id)
    {
        // echo $id;die;
        /* 当前管理员名称 */
        // $data = Db::table('admin')->where('id', $id)->get();
        $data = $this->model->user_data($id);
        $role = Db::table('admin_role')->where('admin_id' , '=', $id)->get();
        $role_data = Db::table('role')->get();
        // var_dump($role);die;
        return view('backend/admin_save', ['data' => $data,'role_data'=>$role_data, 'role'=> $role]);

    }

    /* 修改方法二 */
    public function admin_saves()
    {
        $data = Request::all();
        // var_dump($data);die;
        $role = $data['role_id'];
        unset($data['role_id']);
        DB::table('admin')
            ->where('id', $data['id'])
            ->update($data);

        DB::table('admin_role')
            ->where('admin_id', $data['id'])
            ->update(['role_id' => $role[0]]);

        return Redirect::to('admin_show')->send();
    }



    /* 即点即改 */
    public function gai($id,$show)
    {
        if($show == 1){
            $arr = ['status'=> 0];
        }else{
            $arr = ['status'=> 1];

        }
        /* 修改数据库 */
        $res = DB::table('admin')
            ->where('id', $id)
            ->update($arr);

        if($res){
            return 1;
        }else{
            return 2;
        }
        die;
    }


}
