<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternBmiPercentilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		///
		Schema::create('extern_bmi_percentiles', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned()->unique();
			
			$table->enum('enum', ['M', 'F']);
			$table->decimal('age_mo', 4, 1);
			$table->decimal('p3', 10, 8);
			$table->decimal('p5', 10, 8);
			$table->decimal('p10', 10, 8);
			$table->decimal('p25', 10, 8);
			$table->decimal('p50', 10, 8);
			$table->decimal('p75', 10, 8);
			$table->decimal('p85', 10, 8);
			$table->decimal('p90', 10, 8);
			$table->decimal('p95', 10, 8);
			$table->decimal('p97', 10, 8);
			
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
		Schema::drop('extern_bmi_percentiles');
	}

}
