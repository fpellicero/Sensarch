<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('current_address', 255);
			$table->string('current_job', 255);
			$table->string('past_job', 255);
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
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('current_address');
			$table->dropColumn('current_job');
			$table->dropColumn('past_job');
			$table->dropColumn('facebook');
			$table->dropColumn('twitter');
			$table->dropColumn('linkedin');
			$table->dropColumn('instagram');
		});
	}

}
