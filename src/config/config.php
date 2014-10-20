<?php 

return	[

	/*
	|--------------------------------------------------------------------------
	| Authentication Module
	|--------------------------------------------------------------------------
	|	Chose one off module type
	|	"org" - for organizations (Company(9999), Organization(XX00), Object(X000), Department(IT Department), Title(IT Specialist), Signature())
	|	"social" - for social
	|
	*/

	'module' => 'org',

	/*
	|--------------------------------------------------------------------------
	| View Layout
	|--------------------------------------------------------------------------
	|	Chose layout 
	|	Default layout is from Xlayout 
	|
	*/

	'login-layout' => 'xlayout::layouts.master',
	'default-layout' => 'xlayout::layouts.master',

];