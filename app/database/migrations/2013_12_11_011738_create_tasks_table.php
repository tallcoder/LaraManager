<?php

use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function($table) {
			$table->increments('id');
			$table->string('taskname');
			$table->integer('client_id');
			$table->integer('staff_id');
			$table->integer('budget_total');
			$table->integer('budget_used');
			$table->text('description');
			$table->boolean('completed');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}