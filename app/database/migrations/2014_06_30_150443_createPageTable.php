<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('page', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('user_id');

			$table->string('name');
			$table->string('city');
			$table->string('country');
			$table->longText('description');
			$table->string('url');
			$table->string('address');
			$table->string('facebook', 255);
			$table->string('twitter', 255);
			$table->string('linkedin', 255);
			$table->string('instagram', 255);		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('page');
	}

}
