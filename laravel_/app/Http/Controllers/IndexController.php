<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class IndexController extends Controller {
	
	public function index($id){
		// return "123456789";
		return $id;
	}

}


