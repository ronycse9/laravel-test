<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Action extends Model
{
  protected $table = "students";

  public function index(){
    return "Hello World!";
  }

  public function read($table=NULL, $where = [], $orderby="id", $ordertype="asc"){
      $result = DB::table($table)
            ->where($where)
            ->orderby($orderby,$ordertype)
            ->get();
      return $result;
    }
}
