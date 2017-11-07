<?php 
namespace App\Http\Controllers\Home;

use App\Models\User;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
//use MailThief\Facades\MailThief;    /* 邮件发送 */
//use Mail;
use Request,Redirect,Session,Response;

class LoginController extends Controller {

    public function __construct()
    {
        parent::__construct();

    }

	public function login() {

        /* 如果session 大于等于3 则 不嫩的登录 */
        if(Session::get('login_num') >= 3){
            return Redirect('/');
        }


        /* 接受当前登录 数据 */
        $input = Request::all();
        if($input){

            $result = Db::table('user')->where('username', $input["username"])->get();
            if($result){
                    if($result[0]->password == $input['password']){   /* 判断当前密码是否正确  */
                        Session::set("home_uid", $result[0]->id);   /* 记录session  */
                        $time = time();
                        Session::set('time', $time);   /* 记录当前时间 */

                        $activity_user = $this->activity_user($result[0]->id);   /* 查询当前用户是否有活动记录 */
                        if($activity_user){  /* 如果有 则修改时间 */
                            Db::table('activity_user')->where('uid', '=', $result[0]->id)->update(['login_time'=> $time]);   /*   给当前用户修改活动记录 */
                        }else{   /* 否则直接 添加记录 */
                            Db::table('activity_user')->insert(['uid'=> $result[0]->id, 'login_time'=> $time]);   /*   给当前用户添加一条活动记录 */
                        }

                        return Redirect::to('/')->send();

                    }else{ /* 用户名 或密码错误 */
                        $cookie = Session::get('login_num');

                        if(!$cookie){   /* 如果榕数据为空  */
                            $login_num = Session::set('login_num', 1);
                        }else{
                            $login_num = Session::set('login_num', $cookie + 1);
                        }
                        return Redirect::to('home_login')->send();
                    }
            }else{
                $uid = 0;
            }


		}else{   /* 跳转登录页面 */
		   return view('home/login');
		}

	}


    /* 查询当前用户是偶有过活动记录 */
    public function activity_user($uid)
    {
        $res = Db::table('activity_user')->where('uid', '=', $uid)->get();
        return $res;
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
				 Session::set('home_uid', $uid);
				 echo "<script>alert('注册成功!!!:)')</script>";
				 return Redirect::to('indexs')->send();
			} else {
				 return Redirect::to('register')->send();
			}

		}else{
			return view('home/register');
		}
	}




    /* 密码找回  */
    public function find()
    {
        return view('home/find');
    }


    /* 邮件测试 */
    public function find_add()
    {
//        $input = Request::all();
        Mail::send('home.test', ['name' => 'TFL'], function ($m)  {
            $m->from('1040705956@qq.com', 'Your Application');$m->to('1498961956@qq.com')->subject('邮件测试!');
        });

    }

    /* 密码 修改  */
    public function mm_save()
    {
       return view('home/login_save');
    }

    /* 密码修改2 */
    public function mm_saves()
    {
        $input = Request::all();

        /* 获取当前用户的主键id */
        $uid = Session::get('home_uid');
        $res = Db::table('user')->where('id', '=', $uid)->get();

        if($res[0]->password == $input['load_mm']){
            $result = Db::table('user')->where('id', '=', $uid)->update(['password'=>$input['password']]);
            if($result){
               return Redirect::to('contact')->send();
            }else{
                return view('home/login_save');
            }
        }else{
            return view('home/login_save');
        }
    }

	/* 退出操作 */
	public function logout()
	{
		Session::forget('home_uid');
		Session::forget('time');           /* 删除上次登录时间 */
		return Redirect::to('/')->send();  /* 首页 */
	}


}

