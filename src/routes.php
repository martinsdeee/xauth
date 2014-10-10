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
