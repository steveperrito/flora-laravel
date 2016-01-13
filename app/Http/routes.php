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
Route::get('profile', 'ProfilesController@index');
Route::post('profile', 'ProfilesController@update');

Route::get('profile/{id}', 'ProfilesController@show');
Route::post('profile/{id}', 'ProfilesController@sudoUpdate');

//Admin
Route::get('admin', 'AdminController@dash');

//Authentication
Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController'
]);

//github oAuth login url
Route::get('login', 'oAuthController@gitLogin');
