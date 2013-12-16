<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('user_id');
			$table->integer('budget_used')->unsigned()->default(0);
			$table->integer('budget_total')->unsigned()->default(1);
			$table->boolean('completed')->default(false);
			$table->text('description');
			$table->text('url');
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