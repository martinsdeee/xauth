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

    public static $rules_settings = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

    // Bind with Profile
    public function profile()
    {
    	return $this->hasOne('Martinsdeee\Xauth\Profile');
    }

    // Bind with Role
    public function roles()
    {
        return $this->belongsToMany('Martinsdeee\Xauth\Role')->withTimestamps();
    }
    // Check if Auth user is the same as selected
    public function isCurrent()
    {
    	if (\Auth::guest()) return false;
    	return \Auth::user()->id == $this->id;
    }

    // Check if user has role
    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if($role->name == $name) return true;
        }
        return false;
    }

    // Assign user role
    public function addRole($role)
    {
        return $this->roles()->attach($role);
    }

    // Remove user role
    public function removeRole($role)
    {
        return $this->roles()->detach($role);
    }

}