<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('fk_user')
				->unsigned()
				->references('id')->on('users');

			$table->string('fishname', 255)
				->unique();

			$table->integer('fk_classroom')
				->unsigned()
				->references('id')->on('classrooms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('students');
	}

}
