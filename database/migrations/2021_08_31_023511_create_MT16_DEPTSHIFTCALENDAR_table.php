<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT16DEPTSHIFTCALENDARTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT16_DEPTSHIFTCALENDAR', function(Blueprint $table)
		{
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->string('DEPT_CD', 6);
			$table->dateTime('CALD_DATE');
			$table->string('WORKPTN_CD', 3);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
			$table->string('CLOSING_DATE_CD', 2)->default('15');
			$table->primary(['CALD_YEAR','CALD_MONTH','CLOSING_DATE_CD','DEPT_CD','CALD_DATE'], 'PK_MT16_DEPTSHIFTCALENDAR');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT16_DEPTSHIFTCALENDAR');
	}

}
