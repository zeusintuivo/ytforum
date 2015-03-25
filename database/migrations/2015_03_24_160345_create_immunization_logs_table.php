<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImmunizationLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fk_person` int(10) unsigned DEFAULT NULL,
  `fk_organization` int(10) unsigned DEFAULT NULL,
  `date_given` datetime NOT NULL,
  `other_name` varchar(50) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `titer` float NOT NULL,
	 * @return void
	 */
	public function up()
	{
		Schema::create('immunization_logs', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			$table->integer('person_id')->unsigned();
			$table->foreign('person_id')->references('id')->on('persons');
			$table->integer('organization_id')->unsigned();
			$table->foreign('organization_id')->references('id')->on('organizations');

			$table->dateTime('date_action');
			
			$table->string('other_name', 100);
			$table->tinyInteger('confirmed');
			$table->float('titer');

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
		Schema::drop('immunization_logs');
	}

}
