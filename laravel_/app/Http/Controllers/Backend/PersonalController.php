<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/10/30
 * Time: 16:09
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

class PersonalController extends Controller
{
    public $uid;

    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        $this->uid = Session::get('uid');
        if(!$this->uid){
            return Redirect::to('login')->send();
        }
    }

    /*  查询 当前的系统信息  */
    public function personal()
    {
        echo 1;die;
        /*  查询用户 信息  */
        $data = DB::table('system')->where('uid', $this->uid)->get();
        $user = DB::table('admin')->where('id', $this->uid)->get();
        $data[0]->{'user'} = $user[0]->{'admin_name'};
        return view('backend/widgets', ['data' => $data]);

    }






}