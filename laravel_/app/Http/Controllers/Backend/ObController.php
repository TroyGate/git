<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/3
 * Time: 22:03
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class ObController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        /*  判断是否登录  */
        $user = Session::get('uid');
        if(!$user){
            return Redirect::to('login')->send();
        }

    }
    /* 生成 缓存 */
    public function ob()
    {
        ob_start();
        /* 缓存首页 */
        echo file_get_contents('http://www.home.com/');
        file_put_contents('D:\phpStudy\WWW\laravel\laravel_\public\ob\index.html',ob_get_contents());

        return Redirect('index');
        ob_clean();
    }

    /* 删除缓存文件 */
    public function del_ob()
    {
        // if ($dh = opendir($dir)) {  /* 打开一个 文件 读取其中的内容 */
        //     while (($file = readdir($dh)) !== false) {   指向下一个文件的指针 有true 没有false
        //         echo "filename: $file : filetype: " . filetype($dir . $file) . " ";
        //     }
        //     closedir($dh);
        // } 
        unlink('D:\phpStudy\WWW\laravel\laravel_\public\ob\index.html');
        
        return Redirect('index');
    }


}