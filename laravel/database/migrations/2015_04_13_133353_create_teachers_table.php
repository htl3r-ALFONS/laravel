<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('pk_id');

			$table->integer('fk_user')
				->unsigned()
				->references('pk_id')->on('users');
            
            $table->string('name')
                ->unique();

			$table->string('email')
				->unique();

			$table->string('description')
				->nullable()
				->default(null);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('teachers');
	}

}
