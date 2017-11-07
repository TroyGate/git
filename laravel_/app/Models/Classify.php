<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class Classify extends Model
{
	
	protected $table = 'classify';


    /* 分类 添加 */
    public function add($data){
    	$data['add_time'] = time();
        $res = DB::table('classify')->insertGetId($data);
        return $res;
    }


    /* 查看 全部数据 */
    public function select(){

       return DB::table('classify')->where('is_show', '=', 1 )->get();
    }

    /* 查看单条数据 */
    public function save_add($id)
    {
       return $this->where('id', $id)->first()->toArray();
    }

}