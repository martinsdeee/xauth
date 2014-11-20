<?php
use Martinsdeee\Xauth\User as User;
use Martinsdeee\Xauth\Profile as Profile;
use Martinsdeee\Xauth\Role as Role;
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

Route::get('user/{username}/edit', [
  'as'=>'user.edit',
  'uses'=>'UsersController@edit'
]);

Route::post('user/{username}/edit', [
  'as'=>'user.update',
  'uses'=>'UsersController@update'
]);

// Change Password
Route::get('user/{username}/password', [
  'as'=>'password.edit',
  'uses'=>'UsersController@password_edit'
]);

Route::post('user/{username}/password', [
  'as'=>'password.update',
  'uses'=>'UsersController@password_update'
]);

/**
 * Profile
 */

Route::get('/profile/@{username}', [
  'as'=>'profile.show',
  'uses'=>'ProfilesController@show',
  'before' => 'auth'
]);

Route::get('/profile/@{username}/edit', [
  'as'=>'profile.edit',
  'uses'=>'ProfilesController@edit',
  'before' => 'auth'
]);

Route::post('/profile/@{username}/edit', [
  'as'=>'profile.update',
  'uses'=>'ProfilesController@update',
  'before' => 'auth'
]);

/**
 * Filters
 */

Route::filter('currentUser', function($route)
{
  if ( \Auth::guest() ) return Redirect::to('/');

  if ( \Auth::user()->username !== $route->parameter('username') )
  {
    return Redirect::to('/');
  }
});

Route::filter('role', function($route, $request, $role)
{
  if (Auth::guest() or Auth::user()->hasRole($role))
  {
    return Redirect::to('/');
  }
});
