<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use YTForum\Models\Pool;
use YTForum\Models\PoolOptions;

class CreatePoolOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('pool_options');
		Schema::create('pool_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('pool_id')->unsigned();
			$table->string('title');
			$table->integer('vote');
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
		Schema::drop('pool_options');
	}

}
