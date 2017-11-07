<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/1
 * Time: 20:25
 */
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use App\Models\Meta;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class DatabaseController extends Controller
{

    /* 构造函数  */
    public function __construct()
    {
        parent::__construct();
        /*  判断是否登录  */
        $user = Session::get('uid');
        if (!$user) {
            return Redirect::to('login')->send();
        }

    }

    /* 数据库选择 */
    public function data()
    {
        $data = DB::select("show databases");
        return view('backend/database_data', ['data' => $data]);
    }

    /* 数据库的备份 */
    public function backups(){

        $data = Request::all();
        //数据库备份
        $cfg_dbhost = 'localhost';
        $cfg_dbname = $data['databases'];
        $cfg_dbuser = 'root';
        $cfg_dbpwd = 'root';
        $cfg_db_language = 'utf8';

        $to_file_name = "D:/phpstudy/project.sql";

        // END 配置
        //链接数据库
        $link = mysqli_connect($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd,$cfg_dbname);
        //选择编码
        mysqli_set_charset($link,$cfg_db_language);
        //数据库中有哪些表
        $tables = mysqli_query($link,"show tables");

        //将这些表记录到一个数组
        $tabList = array();
        while($row = mysqli_fetch_row($tables)){
            $tabList[] = $row[0];
        }

        file_put_contents($to_file_name,FILE_APPEND);
        //将每个表的表结构导出到文件
        foreach($tabList as $val){
            $sql = "show create table ".$val;
            $res = mysqli_query($link,$sql);
            $row = mysqli_fetch_array($res);

            $sqlStr = $row[1].";\r\n\r\n";
            //追加到文件
            file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
            //释放资源
            mysqli_free_result($res);
        }
        //将每个表的数据导出到文件
        foreach($tabList as $val){
            $sql = "select * from ".$val;
            $res = mysqli_query($link,$sql);
            //如果表中没有数据，则继续下一张表
            if(mysqli_num_rows($res)<1) continue;

            $info = "";
            file_put_contents($to_file_name,$info,FILE_APPEND);
            //读取数据
            while($row = mysqli_fetch_row($res)){
                $sqlStr = "INSERT INTO `".$val."` VALUES (";
                foreach($row as $zd){
                    $sqlStr .= "'".$zd."', ";
                }
                //去掉最后一个逗号和空格
                $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
                $sqlStr .= ");\r\n";
                file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
            }
            //释放资源
            mysqli_free_result($res);
            file_put_contents($to_file_name,"\r\n",FILE_APPEND);
        }
        echo "<script>alert('备份成功');location.href='sql_list'</script>";
        return Redirect('database_data');

    }


    /* 还原数据库的   */
    public function restore_html()
    {
        $data = DB::select("show databases");
        return view('backend/database_html', ['data' => $data]);
    }

    /* 数据库还原 */
    public  function restore()
    {
        /* 接值  */
        $data = Request::all();

        $cfg_dbhost = 'localhost';
        $cfg_dbname = $data['databases'];
        $cfg_dbuser = 'root';
        $cfg_dbpwd = 'root';
        $cfg_db_language = 'utf8';

        /* 首先创建数据库 */
        $sql = 'create database '.$data['databases'].'';
        Db::select($sql);

        //链接数据库
        $link = mysqli_connect($cfg_dbhost,$cfg_dbuser,$cfg_dbpwd,$cfg_dbname);
        //选择编码
        mysqli_set_charset($link,$cfg_db_language);



        $arr = file_get_contents('D:/phpstudy/project.sql');
        $sql_value = '';

        $arr_data = explode(';', $arr);
//        var_dump($arr_data);die;

        foreach($arr_data as $key => $val)
        {
            mysqli_query($link,$val);
        }
        echo "<script>alert('还原成功');location.href='sql_list'</script>";
        return Redirect('database_data');


    }

    /* 还原数据  */
//    public function huanyuan()
//    {
//        $filename = ROOT_PATH ."/public/sql/project.sql";
//        $host = "localhost"; //主机名
//        $user = "root"; //MYSQL用户名
//        $password = "root"; //密码
//        $dbname = "project"; //在此指定您要恢复的数据库名，不存在则必须先创建,请自已修改数据库名
//        $con = mysql_connect($host, $user, $password);
//
//        $sqlDatabase = 'create database ' . $dbname;
//        mysql_query($sqlDatabase, $con);
//
//        mysql_select_db($dbname);
//        $mysql_file = $filename; //指定要恢复的MySQL备份文件路径,请自已修改此路径
//        $this->restore($mysql_file); //执行MySQL恢复命令
//
//    }


}