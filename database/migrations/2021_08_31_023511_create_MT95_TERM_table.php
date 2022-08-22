<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT95TERMTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT95_TERM', function(Blueprint $table)
		{
			$table->smallInteger('TERM_NO')->primary('PK_MT95_TERM');
			$table->string('COMPUTER_NAME', 20);
			$table->string('INSTANCE_NAME', 40);
			$table->string('DATABASE_NAME', 20);
			$table->string('USER_NAME', 20);
			$table->string('USER_PASSWORD', 20);
			$table->string('TERM_NAME', 15);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT95_TERM');
	}

}
