<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMT02CALENDARPTNTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MT02_CALENDAR_PTN', function(Blueprint $table)
		{
			$table->string('CALENDAR_CD', 3)->primary('PK_MT02_CALENDAR_PTN');
			$table->string('CALENDAR_NAME', 20);
			$table->string('CALENDAR_CLS_CD', 2);
			$table->string('MON_WORKPTN_CD', 3);
			$table->string('TUE_WORKPTN_CD', 3);
			$table->string('WED_WORKPTN_CD', 3);
			$table->string('THU_WORKPTN_CD', 3);
			$table->string('FRI_WORKPTN_CD', 3);
			$table->string('SAT_WORKPTN_CD', 3);
			$table->string('SUN_WORKPTN_CD', 3);
			$table->string('HLD_WORKPTN_CD', 3);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('UPD_DATE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('MT02_CALENDAR_PTN');
	}

}
