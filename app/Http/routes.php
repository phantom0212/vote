<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();
Route::get('/', function () {
    return view('index');
});
// route to show the login form
Route::get('login', array('uses' => 'AuthController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'AuthController@doLogin'));
Route::get('logout', array('uses' => 'AuthController@doLogout'));
Route::get('/admin', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

// User
Route::get('user', function () {
    $users = App\User::all();
    return view('ajax.index',compact('users'));
});
Route::get('user/{user_id?}',function($user_id){
    $user = App\User::find($user_id);
    return response()->json($user);
});
Route::post('user',function(Request $request){
    $user = App\User::create($request->input());
    return response()->json($user);
});
Route::put('user/{user_id?}',function(Request $request,$user_id){
    $user = App\User::find($user_id);
    $user->name = $request->name;
    $user->details = $request->details;
    $user->save();
    return response()->json($user);
});
Route::delete('user/{user_id?}',function($user_id){
    $user = App\User::destroy($user_id);
    return response()->json($user);
});