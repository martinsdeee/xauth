<?php namespace Martinsdeee\Xauth;

use \Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    protected $fillable = [
    	'username', 'email', 'password'
    ];

    public static $rules = [
    	'username' => 'required|unique:users',
    	'email' => 'required|email|unique:users',
    	'password' => 'required|confirmed'
    ];

}