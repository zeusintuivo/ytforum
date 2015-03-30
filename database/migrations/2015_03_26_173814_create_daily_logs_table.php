<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	-- Daily Log --

	id
	<- Medication orders administration

	<- standard order list 
	params string ""
	Date #	
	Time In @	
	Time Out @	 
	Student	-> person
	Category -> params
	status_ids -> string [1,2,3,4,5,6]
	Time Period -> params
	Location -> params
	Referred to ->params
	
	<- medical comments
		Medication administered for the current visit
		Reason for visit
		Clinical Findings
		Assessments
		Treatment Plan/Intervention
		Additional Comments

	created_at
	updated_at


	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_logs', function(Blueprint $table)
		{
			$table->bigIncrements('id')->unsigned()->unique();
			
			$table->timestamps();
			$table->date('date');
			$table->time('timein');
			$table->time('timeout');


			//student id
			$table->integer('person_id')->unsigned();
			// $table->foreign('person_id')->references('id')->on('persons');
			
			//only one value at a time
			// <select id="elementValue_139" name="elementValue_139" style="font-family:verdana;font-size:11px;width:100%;" onchange="save_walkthrough(0);"><option value="355">(OV) Office Visit
			// 	</option><option value="356" selected="">(IL-NS) Non Serious Illness
			// 	</option><option value="357">(IL-SE) Serious Illness
			// 	</option><option value="358">(IN-NS) Non Serious Injury
			// 	</option><option value="359">(IN-SE) Serious Injury
			// 	</option><option value="360">(CO) Counseling
			// 	</option><option value="361">(CDM) Chronic Disease Management
			// 	</option><option value="362">(SP) Special Procedure
			// 	</option><option value="363">(MT) Meeting
			// 	</option><option value="415">(ED) Education
			// 	</option>
			// </select>
			// $table->enum('category', ['IL-SE','IN-NS','IN-SE','CO','CDM','SP','MT','ED']);
			
			$table->integer('category_id')->unsigned(); 
			// $table->foreign('category_id')->references('id')->on('daily_log_params');
			
			// select several options 
			// (RTC) Returned to class
			// (PC) Parent/guardian called/notified
			// (H) Sent Home
			// (R) Referred to provider
			// (EMS) Required EMS response and emergency room care
			// (AED) Automatic External Defibrillator was used to resucitate student/staff
			// max:RTC,PC,H,R,EMS,AED
			// max:[1,2,3,4,5,6] max sample field explode(',')

			$table->string('status_ids', 50); 
			// $table->foreign('category_id')->references('id')->on('daily_log_params');
			
			$table->integer('timeperiod_id')->unsigned();
			// $table->foreign('timeperiod_id')->references('id')->on('daily_log_params');
			
			$table->integer('location_id')->unsigned();
			// $table->foreign('location_id')->references('id')->on('daily_log_params');
			
			$table->integer('referred_to')->unsigned();
			// $table->foreign('referred_to')->references('id')->on('daily_log_params');

			// $table->text('reason_for_visit');
			// $table->text('clinical_findings');
			// $table->text('assessments');
			// $table->text('treatment_plan_intervention');
			// $table->text('additional_comments');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daily_logs');
	}

}
