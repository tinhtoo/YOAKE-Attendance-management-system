<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR50WORKTIMETable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR50_WORKTIME', function(Blueprint $table)
		{
			$table->string('EMP_CD', 10);
			$table->dateTime('CRT_DATE');
			$table->smallInteger('TERM_NO');
			$table->string('WORKTIME_CLS_CD', 2);
			$table->dateTime('WORK_DATE');
			$table->smallInteger('WORK_TIME_HH');
			$table->smallInteger('WORK_TIME_MI');
			$table->char('DATA_OUT_CLS_CD', 2);
			$table->string('DATA_OUT_DATE', 8);
			$table->dateTime('CALD_DATE')->nullable();
			$table->primary(['EMP_CD','CRT_DATE','TERM_NO'], 'PK_TR50_WORKTIME');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR50_WORKTIME');
	}

}
