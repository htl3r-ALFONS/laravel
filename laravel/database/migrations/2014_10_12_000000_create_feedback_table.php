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
			$table->increments('pk_id');
			$table->string('content');
			$table->integer('fk_teacher');
            $table->integer('fk_question');
			$table->integer('rating');
            $table->integer('fk_student');
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
