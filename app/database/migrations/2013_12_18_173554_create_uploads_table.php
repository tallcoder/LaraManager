<?php

use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploads', function($table) {
           $table->increments('id');
           $table->string('name');
           $table->string('type');
           $table->float('size');
           $table->integer('created_by');
           $table->string('permission');
           $table->string('parent_type');
           $table->integer('parent_id');
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
		Schema::drop('uploads');
	}

}