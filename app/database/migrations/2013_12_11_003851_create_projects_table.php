<?php

use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function($table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('client_id');
			$table->integer('budget_used')->unsigned()->default(0);
			$table->integer('budget_total')->unsigned()->default(1);
			$table->boolean('completed')->default(false);
			$table->softDeletes();
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
		Schema::drop('projects');
	}

}