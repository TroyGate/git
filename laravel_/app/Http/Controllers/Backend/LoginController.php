<?php 
namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Request,Redirect,Session;

class LoginController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    /*  登录操作  */
	public function login()
    {
        $input = Request::all();

        if($input){
            $model = new User();
            $uid = $model->is_login($input);

            if( $uid ){
                /* 获取当前 用户ip */
                $arr = $this->system();

                /* 查看当前管理员是否 添加过 配置信息 */
                $res = Db::table('system')->where('uid', '=', $uid)->get();
                if($res){
                    $result = Db::table('system')->where('uid', '=', $uid)->update($arr);
                }else{
                    $arr['uid'] = $uid;
                    $result = Db::table('system')->insert($arr);
                }

                /* 判断上次操作是否成功 */
                if($result){
                    Session::set('uid_time', time());
                    Session::set('uid', $uid);
                    Session::set('admin', $input['username']);
                    return Redirect::to('index')->send();
                }else{  /* 用户名 或密码错误 */
                    return Redirect::to('login')->send();
                }

            }else{  /* 用户名 或密码错误 */
                return Redirect::to('login')->send();
            }

        }else{
            return view('backend/login');
		}

	}


	/* 注册 账户 */
	public function register()
	{
		$input = Request::all();

		if( $input ){
			$model = new User();
			$uid = $model->register($input);

			/* 注册完就直接登录 */
			if( $uid ) {   
				 Session::set('uid', $uid);
				 echo "<script>alert('注册成功!!!:)')</script>";
				 return Redirect::to('index')->send();
			} else {
				 return Redirect::to('register')->send();
			}

		}else{
			return view('backend/register');
		}
	}


	/* 退出操作 */
	public function logout()
	{
		Session::forget('uid');
		return Redirect::to('login')->send();
	}


    /* 当前用户的 系统版本信息   */
    public function system()
    {
        /* 获取当前用户的 系统信息  数据库版本 */
        $sql = DB::select("select VERSION()");
        $arr['mysql'] = $sql[0]->{"VERSION()"};

        /* php  版本 */
        $arr['php'] = PHP_VERSION;

        /* 最大上传 限制 */
        $arr['file_size'] = get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"2";

        /*  当前系统  */
        $arr['system'] = PHP_OS;

        /* 当前用户的ip */
        $arr['ip'] = $_SERVER['REMOTE_ADDR'];

        /* 存储当前管理员登录时间 */
        $arr['add_time'] = time();

        /* 存入session */
        Session::set('time', $arr['add_time']);
        return $arr;
    }


}

