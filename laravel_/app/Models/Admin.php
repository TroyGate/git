<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
	
	protected $table = 'admin';

	/* 验证是否登录 */
    public function user_data($id){
    	return $this->where('id', $id)->first()->toArray();
    }


    

}