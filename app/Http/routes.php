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

Route::auth();

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index')->name('list-user');
    Route::post('/add-user', 'HomeController@addUser')->name('add-user');
    Route::delete('/delete/{id}', 'HomeController@destroy')->name('delete-user');
});