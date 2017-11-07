<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Meta extends Model
{
	
	protected $table = 'meta';

	/* 验证是否登录 */
    public function save_add($id){
        return $this->where('id', $id)->first()->toArray();
    }



}