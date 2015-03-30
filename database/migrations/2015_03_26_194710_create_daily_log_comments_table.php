<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLogCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	-- Daily Log Medical Comments –
	id
	student -> person_id
	type string
	value text

	 
	created_at
	updated_at

	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_log_comments', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned()->unique();
		
			$table->bigInteger('daily_id')->unsigned();
			// $table->foreign('daily_id')->references('id')->on('daily_logs');
			
			//student id
			$table->integer('person_id')->unsigned();
			// $table->foreign('person_id')->references('id')->on('persons');
			
			// $table->text('referred_to');
			// $table->text('reason_for_visit');
			// $table->text('clinical_findings');
			// $table->text('assessments');
			// $table->text('treatment_plan_intervention');
			// $table->text('additional_comments');
			$table->string('type', 50);
			$table->text('value');
		
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
		Schema::drop('daily_log_comments');
	}

}
