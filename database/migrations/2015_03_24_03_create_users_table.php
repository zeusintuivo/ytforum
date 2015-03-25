<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->string('name', 50);
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->enum('isAdmin', array(0,1))->default(0);
			$table->rememberToken();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
			$table->timestamps();
		});
	}
	/** 
	`username` char(50) NOT NULL,         $table->string('name', 100);
  `fk_person` int(10) unsigned NOT NULL,
  `pass_hash` char(32) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
