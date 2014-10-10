
<?php

class SessionsController extends \BaseController {


  /**
   * Login form
   */
  public function create()
  {
    return View::make('xauth::sessions.create');
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
