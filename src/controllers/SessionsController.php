<?php

use Martinsdeee\Xauth\User as User;

class SessionsController extends \BaseController {


  /**
   * Login form
   */
  public function create()
  {
    return View::make('xauth::sessions.create');
  }

  public function remind()
  {
    return View::make('xauth::sessions.password_remind');
  }

   public function reset()
  {
    return View::make('xauth::sessions.password_reset');
  }

  public function store()
  {
    $input = Input::only('usernameOrEmail', 'password');
    $field = filter_var($input['usernameOrEmail'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

    if (Auth::attempt(array($field => $input['usernameOrEmail'], 'password' => $input['password']), true)) {
      return Redirect::home();
    } 
    return Redirect::route('create.session');
  }

  /**
   * Destroy Session
   * @return Redirect
   */
  public function destroy()
  {
    Auth::logout();
    return Redirect::home();
  }

}
