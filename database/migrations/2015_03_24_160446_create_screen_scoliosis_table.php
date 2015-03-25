<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScreenScoliosisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('screen_scoliosis', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
			$table->integer('organization_id')->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations');

			$table->dateTime('date_action');
			
			$table->enum('result', ['p', 'f']);
			$table->enum('rescreen', ['p', 'f']);
			$table->enum('examiner', ['p', 'f']);

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
		Schema::drop('screen_scoliosis');
	}

}
