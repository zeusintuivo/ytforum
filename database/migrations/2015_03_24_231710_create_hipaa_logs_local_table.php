<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHipaaLogsLocalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('hipaa_logs', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->bigIncrements('id')->unsigned()->unique();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');

			$table->integer('organization_id')->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations');

			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles');

			$table->integer('state_id')->unsigned();
			$table->foreign('state_id')->references('id')->on('states');

			$table->integer('providence_id')->unsigned();
			$table->foreign('providence_id')->references('id')->on('providences');

			$table->integer('country_id')->unsigned();
			$table->foreign('country_id')->references('id')->on('countrys');

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->text('newvalue');
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
		Schema::drop('hipaa_logs');
	}

}
