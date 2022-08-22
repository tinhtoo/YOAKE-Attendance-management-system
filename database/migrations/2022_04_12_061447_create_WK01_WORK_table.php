<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWK01WORKTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('WK01_WORK', function(Blueprint $table)
		{
			$table->string('LOGIN_ID', 10);
			$table->string('EMP_CD', 10);
			$table->string('CALD_YEAR', 4);
			$table->string('CALD_MONTH', 2);
			$table->dateTime('CALD_DATE');
			$table->string('WORKPTN_CD', 6);
			$table->dateTime('WORKPTN_STR_TIME');
			$table->dateTime('WORKPTN_END_TIME');
			$table->string('REASON_CD', 2);
			$table->smallInteger('OFC_TIME_HH')->nullable();
			$table->smallInteger('OFC_TIME_MI')->nullable();
			$table->smallInteger('OFC_CNT');
			$table->smallInteger('LEV_TIME_HH')->nullable();
			$table->smallInteger('LEV_TIME_MI')->nullable();
			$table->smallInteger('LEV_CNT');
			$table->smallInteger('OUT1_TIME_HH')->nullable();
			$table->smallInteger('OUT1_TIME_MI')->nullable();
			$table->smallInteger('OUT1_CNT');
			$table->smallInteger('IN1_TIME_HH')->nullable();
			$table->smallInteger('IN1_TIME_MI')->nullable();
			$table->smallInteger('IN1_CNT');
			$table->smallInteger('OUT2_TIME_HH')->nullable();
			$table->smallInteger('OUT2_TIME_MI')->nullable();
			$table->smallInteger('OUT2_CNT');
			$table->smallInteger('IN2_TIME_HH')->nullable();
			$table->smallInteger('IN2_TIME_MI')->nullable();
			$table->smallInteger('IN2_CNT');
			$table->smallInteger('WORK_TIME_HH');
			$table->smallInteger('WORK_TIME_MI');
			$table->smallInteger('TARD_TIME_HH');
			$table->smallInteger('TARD_TIME_MI');
			$table->smallInteger('LEAVE_TIME_HH');
			$table->smallInteger('LEAVE_TIME_MI');
			$table->smallInteger('OUT_TIME_HH');
			$table->smallInteger('OUT_TIME_MI');
			$table->smallInteger('OVTM1_TIME_HH');
			$table->smallInteger('OVTM1_TIME_MI');
			$table->smallInteger('OVTM2_TIME_HH');
			$table->smallInteger('OVTM2_TIME_MI');
			$table->smallInteger('OVTM3_TIME_HH');
			$table->smallInteger('OVTM3_TIME_MI');
			$table->smallInteger('OVTM4_TIME_HH');
			$table->smallInteger('OVTM4_TIME_MI');
			$table->smallInteger('OVTM5_TIME_HH');
			$table->smallInteger('OVTM5_TIME_MI');
			$table->smallInteger('OVTM6_TIME_HH');
			$table->smallInteger('OVTM6_TIME_MI');
			$table->smallInteger('OVTM7_TIME_HH');
			$table->smallInteger('OVTM7_TIME_MI');
			$table->smallInteger('OVTM8_TIME_HH');
			$table->smallInteger('OVTM8_TIME_MI');
			$table->smallInteger('OVTM9_TIME_HH');
			$table->smallInteger('OVTM9_TIME_MI');
			$table->smallInteger('OVTM10_TIME_HH');
			$table->smallInteger('OVTM10_TIME_MI');
			$table->smallInteger('EXT1_TIME_HH');
			$table->smallInteger('EXT1_TIME_MI');
			$table->smallInteger('EXT2_TIME_HH');
			$table->smallInteger('EXT2_TIME_MI');
			$table->smallInteger('EXT3_TIME_HH');
			$table->smallInteger('EXT3_TIME_MI');
			$table->smallInteger('EXT4_TIME_HH');
			$table->smallInteger('EXT4_TIME_MI');
			$table->smallInteger('EXT5_TIME_HH');
			$table->smallInteger('EXT5_TIME_MI');
			$table->smallInteger('RSV1_TIME_HH');
			$table->smallInteger('RSV1_TIME_MI');
			$table->smallInteger('RSV2_TIME_HH');
			$table->smallInteger('RSV2_TIME_MI');
			$table->smallInteger('RSV3_TIME_HH');
			$table->smallInteger('RSV3_TIME_MI');
			$table->float('WORKDAY_CNT', 53, 0);
			$table->float('HOLWORK_CNT', 53, 0);
			$table->float('SPCHOL_CNT', 53, 0);
			$table->float('PADHOL_CNT', 53, 0);
			$table->float('ABCWORK_CNT', 53, 0);
			$table->float('COMPDAY_CNT', 53, 0);
			$table->float('RSV1_CNT', 53, 0);
			$table->float('RSV2_CNT', 53, 0);
			$table->float('RSV3_CNT', 53, 0);
			$table->string('UPD_CLS_CD', 2);
			$table->string('FIX_CLS_CD', 2);
			$table->string('RSV1_CLS_CD', 6);
			$table->string('RSV2_CLS_CD', 6);
			$table->dateTime('ADD_DATE');
			$table->dateTime('UPD_DATE');
			$table->string('REMARK', 30);
			$table->float('SUBHOL_CNT', 53, 0);
			$table->float('SUBWORK_CNT', 53, 0);
			$table->primary(['LOGIN_ID','EMP_CD','CALD_DATE'], 'PK__WK01_WOR__6D99C45A1E6AD1F3');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('WK01_WORK');
	}

}
