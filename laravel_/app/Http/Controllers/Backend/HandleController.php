<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Session, Redirect, Request;

class HandleController extends Controller {

     public $model;

     /* 进行数据的展示 */
     public function handle_show()
     {
        $users = DB::table('handle')
            ->join('authz', 'handle.authz_controller', '=', 'authz.controller')
            ->join('admin', 'handle.uid', '=', 'admin.id')
            ->select('handle.*', 'authz.authz_name', 'admin.admin_name')
            ->paginate(7);
        return view('backend/handle_show', ['data' => $users]);
     }

}