<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;

class Home extends Controller
{

    public function index(){
        $obj = new Action();
        $where = [
             //['id','2']
          ];

        $data = $obj->read("students",$where);
        //$data = Action::paginate(1);
        return view("welcome",compact('data',$data));
    }
}
