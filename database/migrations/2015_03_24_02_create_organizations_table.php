<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_organization` int(10) unsigned DEFAULT NULL,
  `name` text NOT NULL,
  `jurisdiction` varchar(255) NOT NULL,
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('organizations', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->integer('organization_id')->unsigned();
			// $table->foreign('organization_id')->references('id')->on('organizations');
			$table->string('name', 100);
			$table->string('jurisdiction', 100);
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
		Schema::drop('organizations');
	}

}




