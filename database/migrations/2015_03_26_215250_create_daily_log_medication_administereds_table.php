<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLogMedicationAdministeredsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	-- Daily Log Medication Administered --
	 id
	Medication -> params_id
		<id from generic list>
		120 mg of Tylenol liquid or chewable by oral, PRN

	Legend_id -> params_id
		 Medication pending
		 Medication cancelled
		 Medication given but not signed by the nurse
		 Medication given and signed by the nurse

	Procedure -> params_id
		?? varchar

	Date	date
	time Sched.	timestamp
	time Given	timestamp
	Student_id -> person _id	
	
	Nurse -> person_nurse

	Note_id -> dailylog comments
		

	created_at
	updated_at


	-- Daily Log Medication Administered --
	id
	daily_log_id  -> daily logs
	student_id -> person_id
	category_id -> params[category][id]
	medication_id -> params[medication][id]
	legend_id -> params[lenged][id]
	procedure_id -> param[procedure][id]
	date date
	time in time
	time out time
	note_id -> medication_note_id

	created_at
	updated_at
	
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_log_medication_administereds', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned()->unique();
	
			$table->bigInteger('daily_log_id')->unsigned();
			// $table->foreign('daily_log_id')->references('id')->on('daily_logs');
	
			$table->integer('person_id')->unsigned();
			// $table->foreign('person_id')->references('id')->on('persons');
			
			$table->integer('nurse_id')->unsigned();
			// $table->foreign('nurse_id')->references('id')->on('persons');
			
			$table->integer('category_id')->unsigned(); 
			// $table->foreign('category_id')->references('id')->on('daily_log_params');
						
			$table->integer('medication_id')->unsigned(); 
			// $table->foreign('medication_id')->references('id')->on('daily_log_params');
						
			$table->integer('legend_id')->unsigned(); 
			// $table->foreign('legend_id')->references('id')->on('daily_log_params');
			
			$table->integer('procedure_id')->unsigned(); 
			//Point to vague procedure
			// point to a params ? 
			// or point to a medical comment 
			// $table->foreign('procedure_id')->references('id')->on('daily_log_comments');
			
			$table->date('date');
			$table->time('timein');
			$table->time('timeout');

			$table->bigInteger('note_id')->unsigned();
			// $table->foreign('note_id')->references('id')->on('daily_log_medication_notes');
		
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
		Schema::drop('daily_log_medication_administereds');
	}

}
