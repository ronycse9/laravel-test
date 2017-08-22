<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action;

class Home extends Controller
{

    public function index(Request $request){

      echo $request->session()->get("my")[0];

      $obj = new Action();

        $where = [
             //['id','2']
          ];

        //$data = $obj->read("students",$where);
        $data = Action::paginate(2);
        return view("welcome",compact('data',$data));
    }

    public function save(Request $request){
      $obj = new Action();
      $data = [
        "name"      => $request->input('name'),
        "mobile"    => $request->input('mobile'),
        "email"     => $request->input('email'),
        "address"   => $request->input('address')
      ];
      $msg = $obj->add("students",$data);
      return redirect("/test");
    }

    public function ajax(){
      $obj = new Action();
      $receive = filter_input(INPUT_POST,"where");
      $condition = json_decode($receive,TRUE);
      $table = $condition['table'];
      $where = array();
      if(array_key_exists("cond",$condition)){
        $where = $condition['cond'];
      }
      $data = $obj->read($table,$where);
      return response()->json($data);
    }

}
