<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLG01WORKTIMECONVTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('LG01_WORKTIMECONV', function(Blueprint $table)
		{
			$table->smallInteger('TERM_NO');
			$table->dateTime('STR_DATE');
			$table->dateTime('END_DATE')->nullable();
			$table->string('GET_FLG', 1)->nullable();
			$table->text('ERR_CONT')->nullable();
			$table->primary(['TERM_NO','STR_DATE'], 'PK_LG01_WORKTIMECONV');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('LG01_WORKTIMECONV');
	}

}
