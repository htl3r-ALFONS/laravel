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
			$table->increments('pk_id');

			$table->integer('fk_user')
				->unsigned()
				->references('pk_id')->on('users');

			$table->string('fishname', 255)
				->unique();

			$table->integer('fk_class')
				->unsigned()
				->references('pk_id')->on('classes');
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
