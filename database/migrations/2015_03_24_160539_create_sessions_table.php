<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		///
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->string('session_id', 40)->unique();
			$table->integer('ip_address')->unsigned();
			$table->string('user_agent', 120);
			$table->integer('last_activity')->unsigned();
			$table->string('user_data', 120);
			
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
		Schema::drop('sessions');
	}

}
