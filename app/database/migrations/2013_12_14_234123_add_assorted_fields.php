<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAssortedFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function(Blueprint $table) {
			$table->date('begin_date');
			$table->date('end_date');
			$table->date('due_date');
		});

		Schema::table('tasks', function(Blueprint $table) {
			$table->date('begin_date');
			$table->date('end_date');
			$table->date('due_date');
		});

		Schema::table('users', function(Blueprint $table) {
			$table->dateTime('expires');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table) {
			$table->dropColumn('begin_date');
			$table->dropColumn('end_date');
			$table->dropColumn('due_date');
		});

		Schema::table('tasks', function(Blueprint $table) {
			$table->dropColumn('begin_date');
			$table->dropColumn('end_date');
			$table->dropColumn('due_date');
		});

		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('expires');
		});
	}

}