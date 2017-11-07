<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model {

   protected $table = 'admin';

    public function is_login($data)
    {
        $res =  $this->where('admin_name', $data['username'])->get()->toArray();
        
        if(!$res){  /* 判断如果是用户名 错误!! */
        	return false;
        }
        
        if($res[0]['admin_pwd'] == $data['password'])
        {
            return $res[0]['id'];
        }
        
    }


}