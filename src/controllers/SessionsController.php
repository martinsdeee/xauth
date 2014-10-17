
<?php

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
    return 'Store Session';
  }

  public function destroy()
  {
    return 'Destroy Session';
  }

}
