<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_options', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->enum('notify', array('none', 'assigned', 'all'))->default('all');
			$table->enum('notify_frequency', array(0, 2, 12, 24))->default(0);
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
		//
	}

}