<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Session, Redirect, Request;

class RoleController extends Controller
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


    /*  角色 添加页面  */
    public function role()
    {
        $data = Db::table('authz')->get();
//        var_dump($data);die;
        return view('backend/role', ['data'=>$data]);
    }


    /* 角色 添加 */
    public function role_add()
    {
        $data = Request::all();
        $role_authz = $data['authz'];
        unset($data['authz']);

        $str = implode(',', $role_authz);
        /*  如果有数据则添加数据库 */
        if(isset($data)){

            $res = DB::table('role')->insertGetId($data);
            $arr['role_id'] = $res;
            $arr['authz_id'] = $str;

            $res = DB::table('role_authz')->insertGetId($arr);
            if($res) {     /* 判断是否 添加成功 */
                return Redirect::to('role')->send();
            }else{
                return Redirect::to('role')->send();
            }
        }else{
            return Redirect::to('role')->send();
        }

    }


    /*  角色 展示 */
    public function role_show(){

        $data = Db::table('role')->paginate(2);
//        $data = Db::table('role')->get()->map(function ($value) {
//            return $value;
//        })->toArray();
//        var_dump($data);
//        var_dump($data);die;
        return view('backend/role_show', ['data' => $data]);
    }


    /*  搜索后分页 */
    public function search($search)
    {
        $data  = Db::table('role')->where('role_name', 'like', "%$search%")->paginate(2);
        return view('backend/role_show', ['data' => $data, 'search' => $search]);

    }

    /* 角色 删除操作 */
    public function role_delete($id)
    {
        $res = Db::table('role')->where('id', $id)->delete();
        if($res){
            return Redirect::to('role')->send();
        }else{
            return Redirect::to('role_show')->send();
        }
    }

    /* 修改方法一 */
    public function role_save($id)
    {
        /* 当前管理员名称 */
        $model = new Role();
        $res = $model->save_add($id);

        return view('backend/role_save', ['data' => $res]);

    }

    /* 修改方法二 */
    public function role_saves()
    {
        $data = Request::all();

        $res = DB::table('role')
            ->where('id', $data['id'])
            ->update($data);
        if($res){
            return Redirect::to('role_show')->send();
        }else{
            return Redirect::to('role_show')->send();
        }

    }

    /* 即点即改 */
    public function gai($id,$show)
    {
        if($show == 1){
            $arr = ['is_show'=> 0];
        }else{
            $arr = ['is_show'=> 1];

        }
        /* 修改数据库 */
        $res = DB::table('role')
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
