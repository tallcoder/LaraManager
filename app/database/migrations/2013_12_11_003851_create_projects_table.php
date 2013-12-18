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
		$faker = Faker\Factory::create();
		Schema::create('projects', function(Blueprint $table) {
			$date = date('m-d-' . (date('Y') + 1));
			$table->increments('id');
			$table->string('name')->unique();
			$table->integer('user_id')->default(0);
			$table->integer('budget_used')->unsigned()->default(0);
			$table->integer('budget_total')->unsigned()->default(1);
			$table->boolean('completed')->default(false);
			$table->date('begin_date');
			$table->date('end_date');
			$table->date('due_date');
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