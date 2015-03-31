<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoggersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 name of the user
role of the user
school of the user
State/Province of the school (today the schools are all in PA=Pennsylvania)
Country of the school (today the schools are all in USA, but Korea wants a similar system)
date
time of day
new value entered
	 * @return void
	 */
	public function up()
	{
		Schema::create('loggers', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->bigIncrements('id')->unsigned()->unique();
			//All this will be links to ids
			$table->string('role');
			$table->string('school');
			$table->string('state');
			$table->string('providence');
			$table->string('date');
			$table->string('url');
			$table->string('user_agent');
			//Sample value to smaller fields
			$table->string('newvalue');

			$table->enum('_comment', array(0,1))->default(0);
			//Take this outsite to another table if the value comes froma text field that is too big
			$table->text('newvalue_comment');
			//key to Foreign Logger Comments
			$table->timestamp('created_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loggers');
	}

}
