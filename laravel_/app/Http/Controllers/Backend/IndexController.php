<?php 
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

class IndexController extends Controller 
{
	/* 构造函数  */
	public function __construct()
	{
        parent::__construct();
		$this->checkLogin();

    }

	/* 后台首页 */
	public function index()
	{
        return view('backend/index');
	}


	/* 判断是否登录 */
	public function checkLogin()
	{
		$user = Session::get('uid');
		if(!$user){
		    return Redirect::to('login')->send();
		}
	}



}


