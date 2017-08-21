<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//default route
Route::get("/",function(){
  return view("welcome");
});

Route::post("/save","Home@save");

Route::get("/test","Home@index");

Route::post("/getmsg","Home@ajax");

/*

//normal route
Route::get("/",function(){
  return "Hello World!";
});

// match any 5 route method
Route::match(['get','post','put','delete','options'],"/",function(){
  return "Ok";
});

//any route method
Route::any('/',function(){
  return "HI";
});

// parameter must
Route::get("/test/{id}",function($id){
  return "My id is " . $id;
});

//parameter optional
Route::get("/show/{id?}",function($id =  null){
  return "My id is " . $id;
});

//multiple parameter route
Route::get("/mul/{id}/{name}",function($id,$name){
   return $id . "=>" .$name;
});


Route::get('user/profile', function () {
    //
})->name('profile');*/
