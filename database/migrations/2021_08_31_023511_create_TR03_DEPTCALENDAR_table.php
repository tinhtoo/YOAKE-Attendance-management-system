<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTR03DEPTCALENDARTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TR03_DEPTCALENDAR', function(Blueprint $table)
		{
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->string('DEPT_CD', 6);
			$table->string('LAST_PTN_CD', 3)->nullable();
			$table->smallInteger('LAST_DAY_NO')->nullable();
			$table->string('CLOSING_DATE_CD', 2)->default('15');
			$table->primary(['CALD_YEAR','CALD_MONTH','CLOSING_DATE_CD','DEPT_CD'], 'PK_TR03_DEPTCALENDAR');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('TR03_DEPTCALENDAR');
	}

}
