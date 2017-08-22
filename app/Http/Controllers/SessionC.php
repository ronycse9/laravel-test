<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Session;

class SessionC extends Controller
{
  public function getData(Request $request){
   if($request->session()->has('my_name'))
      echo $request->session()->get('my_name');
   else
      echo 'No data in the session';

      echo "<pre>"; print_r($request->session()); echo "</pre>";
}
public function storeData(Request $request){
   $request->session()->put('my_name','Rony Debnath');
   echo "Data has been added to session";

   // other way
   $data = array(
     "name" => "Rony Debnath",
     "mobile" => "01921787634",
     "email" => "ronycse9@gmail.com"
   );
   $request->session()->put('info',$data);
}
public function destroyData(Request $request){
   $request->session()->forget('my_name');
   echo "Data has been removed from session.";
}
}
