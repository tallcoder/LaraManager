<?php

use Illuminate\Database\Migrations\Migration;

class AddClientNameToProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function($table) {
			$table->string('client_name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function($table) {
			$table->dropColumn('client_name');
		});
	}

}