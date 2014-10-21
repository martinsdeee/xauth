<?php


use Martinsdeee\Xauth\User as User;
use Martinsdeee\Xauth\Profile as Profile;

class UsersController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('currentUser', ['only'=>['edit','update']]);
	}
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('xauth::users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$inputUser = Input::only('username', 'email', 'password', 'password_confirmation');
		$inputProfile = Input::only('firstname', 'lastname', 'display_name',
    	'company', 'organization', 'object', 'department',
    	'signature', 'title', 'skills', 'phone', 'mobile', 'inner',
    	'contact_email', 'data');
		$valid = Validator::make($inputUser, User::$rules);
		if ($valid->passes())
		{
			$inputUser['password'] = Hash::make($inputUser['password']);
			$user = User::create($inputUser);
			$inputProfile['display_name'] = $inputProfile['firstname'] . " " . $inputProfile['lastname'];
			$user->profile()->save(new Profile($inputProfile));
			return Redirect::to('/');
		}
		else
		{
			//dd($valid->errors());
			return Redirect::route('user.create')->withInput()->with('errors',$valid->errors());
		}


	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username)
	{
		$user = User::whereUsername($username)->first();
		return View::make('xauth::users.settings')->withUser($user);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username)
	{
	    $input = Input::only(['language']);
	    $user = User::whereUsername($username)->first();

        $rules_settings = [
            'language' => 'required'
        ];

        $v = Validator::make($input, $rules_settings);

        User::whereUsername($username)->update($input);

        return Redirect::back();

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
