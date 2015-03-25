<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerBmiUp extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		DB::unprepared('
              DROP TRIGGER IF EXISTS `bmi_up`;
              CREATE TRIGGER `bmi_up` BEFORE UPDATE ON `screen_bmis`
				FOR EACH ROW BEGIN
				    SET NEW.bmi = CAST((NEW.weight_lb / NEW.height_in / NEW.height_in * 703) AS DECIMAL(3,1));
				END
                   ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::unprepared('DROP TRIGGER IF EXISTS `bmi_up`;');
	}


}
