<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Authz;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class AuthzController extends Controller
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


    /*  权限 添加页面  */
    public function authz()
    {
        $data = Db::table('authz')->get();
        return view('backend/authz', ['data' => $data]);
    }


    /* 权限 添加 */
    public function authz_add()
    {
        $data = Request::all();

        /*  如果有数据则添加数据库 */
        if(isset($data)){

            $res = DB::table('authz')->insertGetId($data);

            if($res) {     /* 判断是否 添加成功 */
                return Redirect::to('authz')->send();
            }else{
                return Redirect::to('authz')->send();
            }
        }else{
            return Redirect::to('authz')->send();
        }

    }


    /*  权限 展示 */
    public function authz_show(){
        $data = Db::table('authz')->paginate(2);

        return view('backend/authz_show', ['data' => $data]);
    }


    /* 权限 删除操作 */
    public function authz_delete($id)
    {

        $res = Db::table('authz')->where('id', $id)->delete();
        if($res){
            return Redirect::to('authz')->send();
        }else{
            return Redirect::to('authz_show')->send();
        }
    }

    /* 修改方法一 */
    public function authz_save($id)
    {

        $data = Db::table('authz')->get();
        /* 当前管理员名称 */
        $model = new Authz();
        $result = $model->save_add($id);

        return view('backend/authz_save', ['result' => $result, 'data'=>$data]);

    }

    /* 修改方法二 */
   public function authz_saves()
   {
       $data = Request::all();
       $res = DB::table('authz')
           ->where('id', $data['id'])
           ->update($data);

       if($res){
           return Redirect::to('authz_show')->send();
       }else{
        return Redirect::to('authz_show')->send();
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
        $res = DB::table('authz')
            ->where('id', $id)
            ->update($arr);

        if($res){
            return 1;
        }else{
            return 2;
        }
        die;
    }

    /*  搜索后分页 */
    public function search($search)
    {
        $data  = Db::table('authz')->where('authz_name', 'like', "%$search%")->paginate(2);

        return view('backend/authz_show', ['data' => $data, 'search' => $search]);

    }


}
