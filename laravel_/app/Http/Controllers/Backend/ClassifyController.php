<?php 
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Classify;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class ClassifyController extends Controller 
{
    public $models;
	/* 构造函数  */
	public function __construct()
	{
        parent::__construct();
        $this->models = new Classify();
        /*  判断是否登录  */
        $user = Session::get('uid');
        if(!$user){
            return Redirect::to('login')->send();
        }

	}


	/*  分类 添加页面  */
	public function classify()
	{
        $data = Db::table('classify')->where('is_show', 1)->get();
        return view('backend/classify', ['data' => $data]);
	}


	/* 分类添加 */
	public function classify_add() 
	{
		$data = Request::all();

        /*  如果有数据则添加数据库 */
		if(isset($data)){
            $model = new Classify();
            $res = $model->add($data);
            if($res) {     /* 判断是否 添加成功 */
                return Redirect::to('classify')->send();
            }else{
                return Redirect::to('classify')->send();
            }
        }else{
            return Redirect::to('classify')->send();
        }

	}


	/*  数据展示 */
	public function classify_show(){
//        echo 1;die;
		$model = new Classify();
		$data = $model->select();
		return view('backend/classify_show', ['data' => $data]);
	}


    /* 修改方法一 */
    public function classify_save($id)
    {
        $data = Db::table('classify')->where('is_show', 1)->get();

        /* 当前管理员名称 */
        $all = $this->models->save_add($id);
        return view('backend/classify_save', ['data' => $data, 'all'=>$all]);

    }

    /* 修改方法二 */
    public function classify_saves()
    {
        $data = Request::all();
        $data['add_time'] = time();
        $res = DB::table('classify')
            ->where('id', $data['id'])
            ->update($data);
        if($res){
            return Redirect::to('classify_show')->send();
//            return view('classify_show');
        }else{
            return Redirect::to('classify_show')->send();
//            return view('classify_show');
        }
        die;
    }


    /* 删除 */
    public function classify_del($id)
    {
        $res = Db::table('classify')->where('id', $id)->delete();
        if($res){
            return Redirect::to('classify_show')->send();
        }else{
            return Redirect::to('classify')->send();
        }
    }

    /* 会舒展的操作 */
    public function classify_recycle($id)
    {
        $res = Db::table('classify')->where('id', '=', $id)->update(['is_show'=>0]);
        if($res){
            $uid = Session::get('uid');
            $data = ['uid' => $uid, 'shop_id' => $id, 'add_time'=>time()];
                $result = Db::table('recycle_bin')->insertGetId($data);
            if($result){
                echo "<script>alert('已成功添加到回收站:)')</script>>";
                return Redirect::to('classify_show')->send();
            }else{
                echo "<script>alert('失败:(')</script>>";
                return Redirect::to('classify_show')->send();
            }
        }
        echo "<script>alert('失败:(')</script>>";
        return Redirect::to('classify_show')->send();
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
        $res = DB::table('classify')
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


