<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAskedToTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('QuestionAskedTo', function(Blueprint $table)
		{
			$table->integer('pk_fk_question');
            $table->integer('pk_fk_class');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('QuestionAskedTo');
	}

}
