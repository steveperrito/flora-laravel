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

//Default view
Route::get('/', function(){
  return redirect('observations/create');
});

//All observation CRUD tasks
Route::resource('observations', 'ObservationController');

//Profile CRUD tasks
Route::get('profile', 'ProfilesController@show');
Route::post('profile', 'ProfilesController@update');

//Admin
Route::get('admin', 'AdminController@dash');

//Authentication
Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController'
]);
