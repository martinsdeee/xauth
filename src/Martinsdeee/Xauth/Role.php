<?php namespace Martinsdeee\Xauth;
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Role extends Eloquent {
    protected $fillable = [];

    public static function test()
    {
    	return "Hello";
    }
}