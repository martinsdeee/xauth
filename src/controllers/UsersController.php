<?php


use Martinsdeee\Xauth\User as User;
use Martinsdeee\Xauth\Profile as Profile;

class UsersController extends \BaseController {

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
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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