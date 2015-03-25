<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 * `id` int(10) unsigned NOT NULL,
  `fk_person` int(10) unsigned NOT NULL,
  `fk_organization` int(10) unsigned NOT NULL,
  `fk_user` int(10) unsigned NOT NULL,
  `assigned_id` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('members', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
			$table->integer('organization_id')->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('assigned_id', 200); /* what is this for */
			$table->tinyInteger('active');
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
		Schema::drop('members');
	}

}
