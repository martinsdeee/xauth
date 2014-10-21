<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Martinsdeee\Xauth\User as User;
use Martinsdeee\Xauth\Profile as Profile;

class ProfilesController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('currentUser', ['only'=>['edit','update']]);
	}
	
	public function show($username)
	{	
		try {
			$user = User::with('profile')->whereUsername($username)->firstOrFail();
		} catch (ModelNotFoundException $e) {
			return Redirect::to('/');
		}
		return View::make('xauth::profiles.show')->withUser($user);
	}

	public function edit($username)
	{
		$user = User::whereUsername($username)->first();
		$profile = Profile::where('user_id', $user['id'])->first();
		return View::make('xauth::profiles.edit')->withProfile($profile);
	}

	public function update($username)
	{
		$inputProfile = Input::only('firstname', 'lastname', 'display_name', 
    	'company', 'organization', 'object', 'department',
    	'signature', 'title', 'skills', 'phone', 'mobile', 'inner', 'fax',
    	'contact_email', 'data');
		
		$user = User::whereUsername($username)->first();
		$user->profile->fill($inputProfile)->save();
		return Redirect::route('profile.show', $user->username);
		
	}

}