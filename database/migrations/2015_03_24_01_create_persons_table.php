<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 -- Person --
	 
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  	`first_name` varchar(100) NOT NULL,
  	`middle_name` varchar(100) NOT NULL,
  	`last_name` varchar(100) NOT NULL,
  	`gender` enum('M', 'F') NOT NULL,
  	jurisdiction
  	`birth_date` date DEFAULT NULL,

	created_at
	updated_at

	 * @return void
	 */
	public function up()
	{
		Schema::create('persons', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->string('first_name', 100);
			$table->string('middle_name', 100);
			$table->string('last_name', 100);
			$table->string('jurisdiction', 100);
			$table->enum('gender', ['m','f']);
			$table->date('birth_date');
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
		//
		Schema::drop('persons');
	}

}
