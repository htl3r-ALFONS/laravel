<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsAskedToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions_asked_to', function(Blueprint $table)
		{
			$table->integer('pk_fk_question')
				->unsigned()
				->references('pk_id')->on('questions');

			$table->integer('pk_fk_class')
				->unsigned()
				->references('pk_id')->on('classes');

			$table->primary(['pk_fk_question', 'pk_fk_class']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('questions_asked_to');
	}

}
