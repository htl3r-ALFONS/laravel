<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedback', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('fk_teacher')
				->unsigned()
				->references('id')->on('teachers');

			$table->integer('fk_student')
				->unsigned()
				->references('id')->on('students');

			$table->integer('fk_question')
				->unsigned()
				->references('id')->on('questions')
                ->nullable()
                ->default(null);

			$table->string('content');

			$table->tinyInteger('rating')
                ->nullable()
                ->default(null);

			$table->boolean('show_fishname');

			$table->boolean('show_classroom');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedback');
	}

}
