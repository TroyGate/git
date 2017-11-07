<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request, Storage;

class AdvertisementController extends Controller
{
    public $model;
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


    /*  广告位页面  */
    public function advertisement_show()
    {
        $data = Db::table('advertisement')->get();

        return view('backend/advertisement_show', ['data' => $data]);
    }



    /* 广告位的添加 */
    public function advertisement($id)
    {
        return view('backend/advertisement', ['id' => $id]);
    }



    /*  广告位的添加  */
    public function advertisement_add()
    {
        $data = Request::All();
        // var_dump($data);die;
        if($data){  /* 若果有 则 添加数据 */
            
            if($data['myfile']){
                unset($data['myfile']);
                $is_file_name = $this->images(Request::file('myfile'));
                $data['img'] = $is_file_name;
            }else{
                unset($data['video']);
                $is_file_name = $this->video(Request::file('video'));
                $data['video'] = $is_file_name;
            }

            if($is_file_name){  /* 检测 文件是否上传成功!! */
                Db::table('advertisement')->insert($data);
            }
            
            return Redirect::to('advertisement_show')->send();

        }else{  /* 如果 没有数据 */
            return Redirect::to('advertisement_show')->send();
        }

    }


    /* 文件上传 */
    public function images($images)
    {
        // 文件是否上传成功
        if ($images->isValid()) {

            // 获取文件相关信息
            $originalName = $images->getClientOriginalName();                // 文件原名
            $ext = $images->getClientOriginalExtension();                    // 扩展名
            $realPath = $images->getRealPath();                              //临时文件的绝对路径
            $type = $images->getClientMimeType();                            // image/jpeg

            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;  // 上传文件
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('images')->put($filename, file_get_contents($realPath));
            
            return uniqid(). '.'.$ext;
        }
    }


    /* 视频上传 */
    public function video($video)
    {
        // 文件是否上传成功
        if ($video->isValid()) {

            // 获取文件相关信息
            $originalName = $video->getClientOriginalName();                // 文件原名
            $ext = $video->getClientOriginalExtension();                    // 扩展名
            $realPath = $video->getRealPath();                              //临时文件的绝对路径
            $type = $video->getClientMimeType();                            // image/jpeg

            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;  // 上传文件
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('public')->put($filename, file_get_contents($realPath));

            return uniqid(). '.'.$ext;
        }
    }

}
