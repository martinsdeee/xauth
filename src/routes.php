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


/**
 * Sessions
 */

Route::get('login', [
    'as'=>'create.session',
    'uses'=>'SessionsController@create'
]);

Route::post('login', [
  'as'=>'store.session',
  'uses'=>'SessionsController@store'
]);

Route::get('logout', [
  'as'=>'destroy.session',
  'uses'=>'SessionsController@destroy'
]);

/**
 * Password Reset
 */

Route::get('password/remind', [
  'as'=>'password.remind',
  'uses'=>'SessionsController@remind'
]);


// Delete after test
Route::get('password/reset', [
  'as'=>'password.reset',
  'uses'=>'SessionsController@reset'
]);

/**
 * Users
 */

Route::get('user/create', [
  'as'=>'user.create',
  'uses'=>'UsersController@create'
]);

Route::post('user/create', [
  'as'=>'user.store',
  'uses'=>'UsersController@store'
]);

/**
 * Profile
 */

Route::get('/profile/@{profile}', [
  'as'=>'profile.show',
  'uses'=>'ProfilesController@show'
]);
