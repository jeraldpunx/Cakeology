<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	$data = array();

// 	if(Auth::check()) {
// 		$data = Auth::user();
// 	}
// 	return View::make('home', array('data' => $data));
// });




Route::get('/', ['as'=>'home', function(){
	return View::make('home');
	// if(Auth::check()) {
	// 	if(Auth::user()->previlage == 0)
	// 		return View::make('admin.index');
	// 	else {
	// 		return View::make('search');
	// 	}
	// } else {
	// 	return View::make('search');
	// }
}]);
//NORMAL

Route::get("fuck", function(){
	return "fucjk";
});
Route::get('login', 				['as'=>'login',    	'uses'=>'UsersController@showLogin'])->before('guest');
Route::post('login', 				'UsersController@doLogin');
Route::get('login/fb', 				['as'=>'fblogin', 	'uses'=>'LoginFacebookController@login']);
Route::get('login/fb/callback',  	'LoginFacebookController@callback');
Route::get('logout', 				['as'=>'logout',   	'uses'=>'UsersController@logout'])->before('auth');
Route::get('register', 				['as'=>'register', 	'uses'=>'UsersController@create'])->before('guest');
Route::post('register', 			'UsersController@store');

