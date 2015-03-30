<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLogParamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 -- Params --
	 id
	 type string
	 value string
	 description string

	created_at
	updated_at
	
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_log_params', function(Blueprint $table)
		{
			$table->increments('id')->unsigned()->unique();
			$table->string('type', 50);
			$table->string('value', 120);
			$table->string('description');
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
		Schema::drop('daily_log_params');
	}

}
