<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/3
 * Time: 20:15
 */

namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class CurdController extends Controller{

    public $table_arr = array();          /* 记录 数据库表名  */
    public $controller_url = __DIR__;     /* 默认的控制器 创建地址 */
    public $model_url = '' ;              /* 默认的model 创建地址 */
    public $controller = '';              /* 记录当前的控制器名 */

    public $controller_wirte ;            /* 记录 当前 controller 写入对象 */
    public $model_wirte ;                 /* 记录 当前 controller 写入对象 */
    public $view_data;                    /* 记录当前视图的名称 */

    public $title = <<<EOL
<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

EOL;

    public $title_two = <<<TWO
<?php
namespace App\Http\Controllers\Home;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session,Redirect;

TWO;


    public function __construct()
    {
        parent::__construct();
        $this->model_url = $this->controller_url . '/../../../Models';
        /*  判断是否登录  */
        $user = Session::get('uid');
        if(!$user){
            return Redirect::to('login')->send();
        }

    }


    /* 一键生成 curd */
    public function curd_create()
    {
        return view('backend/curd');
    }


    /* 查询数据库 */
    public function sel_table($model)
    {
        $this->table_arr = Db::select('show tables');
        foreach ($this->table_arr as $key => $val) {
            $arr[] = $val->Tables_in_project;
        }

        if(in_array($model['model'],$arr)){
            return 1;die;
        }else{
            return 0;die;
        }

    }


    /*   生成 控制 和 model  */
    public function controller_model()
    {

        $data = Request::all();           /*  接受数据 */
        $this->controller = $data['controller'];
        // var_dump($data['model']);die;
//         $is_model = $this->sel_table($data);  /* 查看是否有这个表名 */
//         if(!$is_model){                                /* 如果没有 则不创建 */
//             return Redirect('controller_model');
//         }
// die('sadsad');

        $con = <<<EOL
\r\n
EOL;

        if(empty($data['controller_url']))
        {
            $data['controller_url'] = $this->controller_url;
            $data['title'] = $this->title  . 'class ' . ucfirst($data['controller']) . '{';
            $this->route(ucfirst($data['controller']));   /*  添加后台路由  */
            $this->view_data = $this->view_backend($data['controller']);
        }else{
            $data['title'] = $this->title_two;
            $this->route_hmoe(ucfirst($data['controller']));   /*  添加前台路由  */
            $this->view_data = $this->view_home($data['controller']);
        }

        /*  返回 数组  方法名称 以及 命名空间 */
        $model_namespace = $this->model($data['model'],  $data['model_url']);
        $name = $this->controller_url .'/'. ucfirst($data['controller']) . 'Controller.php';

        $this->controller_wirte = fopen($name, 'w');

        /* 生成命名空间 */
        $model_namespace_str = $model_namespace['name_space'] .'\\'.ucfirst($data["model"]). ';' ;

        fwrite($this->controller_wirte, $this->title . $model_namespace_str  . $con .'class ' . ucfirst($data['controller']) . 'Controller extends Controller {' );

        /*  返回需要跳转的方法  */
        $route = $this->controller_operation( ucfirst($data["model"]),  $data['controller']);

        /* 查询数据库数据 */
        $model = $data['model'];

        $data = $this->model_data($model);
        $ziduan = $this->model_ziduan($model);

        foreach ($data as $key => $val) {
            $val->ziduan = $ziduan;
        }
        $size = count($ziduan);

        $this->view_create($this->view_data);

        /* 查询数据 进行 展示 */
        return view('backend/curd_show', ['data'=>$data, 'ziduan'=>$ziduan, 'route'=>$route, 'size' => $size]);
    }



    /*  进行创建model 表  */
    public function model($model_name, $path)
    {

        /*  指定文件创建的路径路劲 位置 */
        if(empty($path)){
            $path = $this->model_url;    /* 后台 */
            $title = <<<EOL
<?php
namespace App\Models;
\r\n
EOL;
        }else{
            $path = $this->model_url . '/home';  /* 前台 model 路径 */
            $title = <<<EOL
namespace App\Models\home;
\r\n
EOL;
        }


        $title .= <<<EOL
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
\r\n
EOL;
        $con = <<<EOl
\r\n

EOl;

        $title .= 'class '.ucfirst($model_name).' extends Model {' . $con . '   protected $table = \''.$model_name . '\';';

        /* 命名空间返回 */
        $use = explode('../', $path);

        /* 开始创建 文件夹  */
        $name = $path .'/'. ucfirst($model_name) . '.php';

        /* 创建一个文件 */
        $this->model_wirte = fopen($name, 'w');

        fwrite($this->model_wirte, $title);
        $action_arr = $this->model_operation();
        $action_arr['name_space'] = 'use App\\'.$use[3];
        return $action_arr;

    }

    /* model curl 操作 */
    public function model_operation()
    {

        $con = <<<STR
\r\n
STR;
        $jieshu =  '    }';   /* 方法的 结束 标记 */
        /* 查询单挑数据 */
        $public_one = "    public function select_one("."$"."id = 1){";
        $public_two = "         return $"."this->where('id', "."$"."id)->first()->toArray();";


        /* 查询多条数据 */
        $action_select = "    public function select(){";
        $action_select_two = "         $"."data =  $"."this->get()->toArray();";
        $action_select_three = "        return $"."data;";


        /* 添加 */
        $action_add = "    public function add($"."data){".$con;
        $action_add_two = "       $"."data =  $"."this->insert($"."data);".$con.'       return $'.'data;';


        /* 删除 数据   */
        $action_del = "    public function del("."$"."id ){";
        $action_del_two = "         $"."data = $"."this->where('id', '=', "."$"."id)->delete();";
        $action_del_three = "         return $"."data;";

        /* 修改 方法 */
        $action_save = "    public function saves("."$"."id, "."$"."data){";
        $action_save_two = "         return $"."this->where('id', '=', "."$"."id)->update("."$"."data);";

        /* 最后进行 拼接 */
        $sel_one = $con.$public_one.$con.$public_two.$con.' '.$jieshu.$con;
        $sel = $con.$action_select.$con.$action_select_two.$con.' '.$jieshu.$con;
        $add = $con.$action_add.$con.$action_add_two.$con.' '.$jieshu.$con;
        $del = $con.$action_del.$con.$action_del_two.$con.$action_del_three.$con.' '.$jieshu.$con;
        $save = $con.$action_save.$con.$action_save_two.$con.$jieshu.$con;

        fwrite($this->model_wirte, $con.$sel_one.$sel.$add.$del.$save.$con.$jieshu);

        return ['select_one', 'select', 'add', 'del', 'del']  /* 返回 数据库 的方法 */;
    }

    /* 控制器的curl操作 */
    public function controller_operation($model_name, $controller)
    {

        $con = <<<STR
\r\n
STR;
        $jieshu =  '    }';   /* 方法的 结束 标记 */

        $model = '    public $model;';

        /* 构造方法 */
        $controller = '';
        $controller .= '   public function __construct(){'.$con;
        $controller .= '         parent::__construct();'.$con;
        $controller .= '         $'.'this->model = new '.$model_name.'();'.$con;
        $controller .= '    }'.$con;


        /* 查询单挑数据 */
        $action_show = '';
        $action_show .= "    public function ".$this->controller."_show()".$con;
        $action_show .= "    {".$con;
        $action_show .= "         $"."data = $"."this->model->select();".$con;
        $action_show .= "        return view('backend/".$this->controller."_show', ['data' => $"."data]);".$con;
        $action_show .= "    }".$con;

    

        /* 添加 数据 */
        $action_add = '';
        $action_add .= "    public function ".$this->controller."_add(){".$con;
        $action_add .= "        $"."data = Request::All();     /* 接受添加数据 */".$con;
        $action_add .= "        if($"."data){".$con;
        $action_add .= "               $"."result = $"."this->model->add($"."data); ".$con;
        $action_add .= "               if($"."result){".$con;
        $action_add .= "                    return Redirect::to('".$this->controller."_show')->send();".$con;
        $action_add .= "               }else{".$con;
        $action_add .= "                    return Redirect::to('".$this->controller."_add')->send();".$con;
        $action_add .= "               }".$con;
        $action_add .= "        }else{".$con;
        $action_add .= "            return Redirect::to('".$this->controller."_show')->send();".$con;
        $action_add .= "        }".$con;
        $action_add .= "     }".$con;

    
        /* 删除 数据   */
        $action_del = '';
        $action_del .= "     public function ".$this->controller."_del($"."id)".$con;
        $action_del .= "     {".$con.$con;
        $action_del .= "         $"."res = $"."this->model->del($"."id); ".$con;
        $action_del .= "         if($"."res){".$con;
        $action_del .= "             return Redirect::to('".$this->controller."_show')->send();".$con;
        $action_del .= "         }else{".$con;
        $action_del .= "             return Redirect::to('".$this->controller."_show')->send();".$con;
        $action_del .= "         }".$con;
        $action_del .= "     }".$con;

        /* 修改方法一 */
       $action_save = '';
       $action_save .= "    public function ".$this->controller."_save($"."id)".$con;
       $action_save .= "    {".$con.$con;
       $action_save .="        $"."data = $"."this->model->select_one($"."id);".$con;
       $action_save .= "        return view('backend/".$this->controller."_save', ['data'=>$"."data]);".$con;
       $action_save .= "    }".$con;

       /* 修改方法二 */
       $action_saves = '';
       $action_saves .="       public function ".$this->controller."_saves()".$con;
       $action_saves .="       {".$con.$con;
       $action_saves .="           $"."data = Request::all();".$con;
       $action_saves .="           $"."res = $"."this->model->save($"."data['id'], $"."data);".$con;
       $action_saves .="           if($"."res){".$con;
       $action_saves .="               return Redirect::to('".$this->controller."_show')->send();".$con;
       $action_saves .="           }else{".$con;
       $action_saves .="               return Redirect::to('".$this->controller."_show')->send();".$con;
       $action_saves .="           }".$con;
       $action_saves .="       }".$con;

       /* 数据拼接 */
       $str = $con.$con.$model.$con.$con.$controller.$con.$con.$action_show.$con.$con.$action_add.$con.$con.$action_del.$con.$con.$action_save.$con.$con.$action_saves.$con."}";


        fwrite($this->controller_wirte, $str);


        return $route = [
                'add'   =>  $this->controller.'_add',
                'show'   =>  $this->controller.'_show',
                'del'   =>  $this->controller.'_del', 
                'save'   =>  $this->controller.'_save'
        ];
    }

    /* 后台路由 添加 */
   public function route($controller)
   {
       $str = '';
       /* 路由写入 后台 路径 */
       $con = <<<EOL
\r\n
EOL;
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_save/{id}\''.', '.'\'Backend\\'. $controller .'Controller@'.$controller .'_save'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_saves\''.', '.'\'Backend\\'.$controller.'Controller@'. $controller .'_saves'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_del/{id}\''.', '.'\'Backend\\'.$controller.'Controller@'. $controller .'_del'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_show\''.', '.'\'Backend\\'.$controller.'Controller@'. $controller .'_show'.'\''.');';

       $url=__DIR__.'/../../routes.php';
       $handle=fopen($url,"a+");
       $str=fwrite($handle, "\r\n".$str."\r\n");
       fclose($handle);

   }

   /* 前台路由添加 */
   public function route_hmoe($controller)
   {
       $str = '';
       /* 路由写入 后台 路径 */
       $con = <<<EOL
\r\n
EOL;


    

       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_save/{id}\''.', '.'\'Home\\'. $controller .'Controller@'. $controller .'_save'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_saves\''.', '.'\'Home\\'.$controller.'Controller@'. $controller .'_saves'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_del/{id}\''.', '.'\'Home\\'.$controller.'Controller@'. $controller .'_del'.'\''.');';
       $str .= $con;
       $str .= 'Route::any('.'\''.strtolower($controller) .'_show\''.', '.'\'Home\\'.$controller.'Controller@'. $controller .'_show'.'\''.');';


       $url=__DIR__.'/../../routes.php';
       $handle=fopen($url,"a+");
       $str=fwrite($handle, "\r\n".$str."\r\n");
       fclose($handle);


   }


    /* 获取表的数据  */
    public function model_data($table_name)
    {
        /* 表数据 */
        $data = Db::table($table_name)->get();
        return $data;
    }


    /* 查询表字段 */
    public function model_ziduan($table_name)
    {
        /* 表字段 */
        $desc = Db::select('desc '.$table_name);

        /* 数据表 字段 */
        $ziduan = array();
        foreach($desc as $key => $val)
        {
            $ziduan[] = $val->Field;
        }
        return $ziduan;
    }



    /* 视图的创建 */
    public function view_create($data)
    {
      // file_put_contents(public_path('./resources/view/backend/01.php'), 'data');  
        $url = __DIR__.'/../../../../resources/view/'.$data['add'].'.php';
        // file_put_contents($url, '123sadd');
        $obj = fopen($url, 'w');
        fwrite($obj, 'dsadsadasda');
        fclose();
    }


    /* 返回 视图的名称 */
    public function view_home($controller)
    {
        $data = [
            'show'  =>  'Home/'.$controller.'_show',
            'add'  =>  'Home/'.$controller.'_add',
            'save'  =>  'Home/'.$controller.'_save',
       ];
       return $data;
    }



    /* 返回 后台视图的名称 */
    public function view_backend($controller)
    { 
       $data = [
            'show'  =>  'Backend/'.$controller.'_show',
            'add'  =>  'Backend/'.$controller.'_add',
            'save'  =>  'Backend/'.$controller.'_save',
       ];
       return $data;
    }


}