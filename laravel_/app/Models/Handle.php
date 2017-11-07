<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Handle extends Model {

   protected $table = 'handle';

    public function select_one($id = 1){
         return $this->where('id', $id)->first()->toArray();
}

    public function select(){
         return $this->get()->toArray();
}

    public function add($data){
         return $this->insertGetId($data);
}

    public function del($id ){
         return $this->where('id', $id)->delete();
}

    public function save($id, $data){
         return $this->where('id', $id)->update($data);
}

}