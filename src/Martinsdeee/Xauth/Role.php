<?php namespace Martinsdeee\Xauth;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent {
    protected $fillable = [];

    public function user()
    {
    	return $this->belongsTo('Martinsdeee\Xauth\User');
    }
   
}