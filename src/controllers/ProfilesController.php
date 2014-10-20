<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Martinsdeee\Xauth\User as User;
use Martinsdeee\Xauth\Profile as Profile;

class ProfilesController extends \BaseController {
	
	public function show($username)
	{	
		try {
			$user = User::with('profile')->whereUsername($username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return Redirect::to('/');
		}
		return View::make('xauth::profiles.show')->withUser($user);
	}

}