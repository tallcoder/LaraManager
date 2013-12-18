<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
			$date = date('m-d-' . (date('Y') + 1));
			$table->increments('id');
			$table->string('name');
			$table->integer('list');
			$table->integer('project_id');
			$table->integer('created_by');
			$table->integer('assigned_to');
			$table->integer('completed_by');
			$table->integer('budget_total');
			$table->integer('budget_used');
			$table->date('begin_date');
			$table->date('end_date');
			$table->date('due_date');
			$table->text('description');
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
		Schema::drop('tasks');
	}
}
