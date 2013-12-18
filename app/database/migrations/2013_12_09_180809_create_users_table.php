<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('users', function( Blueprint $table) {
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('password');
			$table->enum('usertype', array('admin','staff','client'));
			$table->integer('userperms');
			$table->string('phone');
			$table->date('expires');
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
		Schema::drop('users');
	}

}
