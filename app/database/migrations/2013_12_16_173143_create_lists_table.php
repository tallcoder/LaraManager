<?php

use Illuminate\Database\Migrations\Migration;

class CreateListsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasklists', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer('parent_id');
			$table->boolean('staffonly')->default(false);
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
		Schema::drop('tasklists');
	}

}