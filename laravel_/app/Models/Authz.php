<?php
/**
 * Created by PhpStorm.
 * User: 田壮壮
 * Date: 2017/11/2
 * Time: 21:10
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class Authz extends Model
{
    protected $table = 'authz';

    /* 查看单条数据 */
    public function save_add($id)
    {

        return $this->where('id', $id)->first()->toArray();

    }

}