<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('fk_feedback')
				->unsigned()
                ->nullable()
				->references('id')->on('feedback');
            
            $table->integer('fk_question')
				->unsigned()
                ->nullable()
				->references('id')->on('question');

			$table->timestamp('created_at');
            
            $table->string('content');

			$table->enum('from', ['student', 'teacher']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
