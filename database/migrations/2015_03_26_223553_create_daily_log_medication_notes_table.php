<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLogMedicationNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 one note per medication 
	
	-- Daily Log Medication Administered Notes --
	id
	daily log id   belongs to 
	student_id -> person_id
	type_id -> params[medication type][id]
	value text

	created_at
	updated_at
	
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_log_medication_notes', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned()->unique();
		
			$table->bigInteger('daily_log_medication_admin_id')->unsigned();
			// $table->foreign('daily_log_medication_admin_id')->references('id')->on('daily_log_medication_administereds');
	
			//student id
			$table->integer('person_id')->unsigned();
			// $table->foreign('person_id')->references('id')->on('persons');
			
			// $table->text('referred_to');
			// $table->text('reason_for_visit');
			// $table->text('clinical_findings');
			// $table->text('assessments');
			// $table->text('treatment_plan_intervention');
			// $table->text('additional_comments');

			$table->integer('type_id')->unsigned();
			// $table->foreign('type_id')->references('id')->on('daily_log_params');
			
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
		Schema::drop('daily_log_medication_notes');
	}

}
