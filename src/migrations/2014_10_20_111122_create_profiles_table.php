<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('firstname')->nullable();
			$table->string('lastname')->nullable();
			$table->string('display_name')->nullable();
			if(Config::get('xauth::module')=== 'org') {
				$table->string('company')->nullable();
				$table->string('organization')->nullable();
				$table->string('object')->nullable();
				$table->string('department')->nullable();
				$table->text('signature')->nullable();
			}
			$table->string('title')->nullable();
			$table->text('skills')->nullable();
			$table->text('phone')->nullable();
			$table->text('mobile')->nullable();
			if(Config::get('xauth::module')=== 'org') {
				$table->text('fax')->nullable();
				$table->text('inner')->nullable();
			}
			$table->text('contact_email')->nullable();
			$table->text('data')->nullable();
			$table->string('created_by')->default('system');
			$table->string('changed_by')->default('system');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('profiles');
	}

}
