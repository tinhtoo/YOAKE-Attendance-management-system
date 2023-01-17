<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR04WORKTIMEFIXTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR04_WORKTIMEFIX', function(Blueprint $table)
		{
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->string('DEPT_CD', 6);
			$table->smallInteger('FIX_CNT');
			$table->dateTime('UPD_DATE');
			$table->string('CLOSING_DATE_CD', 2)->default('15');
			$table->primary(['CALD_YEAR','CALD_MONTH','CLOSING_DATE_CD','DEPT_CD'], 'PK_TR04_WORKTIMEFIX');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR04_WORKTIMEFIX');
	}

}
