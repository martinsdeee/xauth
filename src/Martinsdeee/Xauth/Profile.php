<?php namespace Martinsdeee\Xauth;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Profile extends Eloquent {
    protected $fillable = [
    	'firstname', 'lastname', 'display_name', 
    	'company', 'organization', 'object', 'department',
    	'signature', 'title', 'skills', 'phone', 'mobile', 'inner', 'fax',
    	'contact_email', 'data', 'created_by', 'changed_by'
    ];

    public function user()
    {
    	return $this->belongsTo('Martinsdeee\Xauth\User');
    }
}